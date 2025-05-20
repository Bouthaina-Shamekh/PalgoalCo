<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Domain;
use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Jobs\ProvisionHosting;

class SiteComponent extends Component
{
    use WithPagination;

    // --- حالات التنبيه ---
    public bool $alert       = false;
    public string $alertType = 'success';
    public string $alertMessage = '';

    public function showAlert(string $message, string $type = 'success'): void
    {
        $this->alert        = true;
        $this->alertType    = $type;
        $this->alertMessage = $message;
    }

    public function closeModal(): void
    {
        $this->alert = false;
    }

    // --- المتغيرات الرئيسية ---
    public string $mode     = 'index';
    public string $search   = '';
    public int    $perPage  = 10;
    public ?int   $siteId   = null;

    public array $clients = [];
    public array $domains;
    public array $provisioningStatuses = ['pending', 'active', 'failed'];

    public array $site = [
        'client_id'           => '',
        'domain_id'           => '',
        'provisioning_status' => 'pending',
        'cpanel_username'     => '',
        'cpanel_password'     => '',
        'cpanel_url'          => '',
        'provisioned_at'      => '',
    ];

    // --- نماذج إضافة وتعديل وحذف ---
    public function showAdd(): void
    {
        $this->mode    = 'add';
        $this->clients = Client::all()->toArray();
        $this->domains = Domain::all()->toArray();
        $this->resetForm();
        $this->closeModal();
    }

    public function showEdit(int $id): void
    {
        $this->mode    = 'edit';
        $this->siteId  = $id;
        $this->clients = Client::all()->toArray();
        $this->domains = Domain::all()->toArray();

        $site          = Site::findOrFail($id);
        $this->site    = [
            'client_id'           => $site->client_id,
            'domain_id'           => $site->domain_id,
            'cpanel_username'     => $site->cpanel_username,
            'cpanel_password'     => $site->cpanel_password,
            'cpanel_url'          => $site->cpanel_url,
            'provisioning_status' => $site->provisioning_status,
            'provisioned_at'      => $site->provisioned_at,
        ];

        $this->closeModal();
    }

    public function showIndex(): void
    {
        $this->mode = 'index';
        $this->closeModal();
    }

    protected function resetForm(): void
    {
        $this->site = [
            'client_id'           => '',
            'domain_id'           => '',
            'provisioning_status' => 'pending',
            'cpanel_username'     => '',
            'cpanel_password'     => '',
            'cpanel_url'          => '',
            'provisioned_at'      => '',
        ];
        $this->siteId = null;
    }

    // --- فحص قوة كلمة المرور ---
    public bool $uppercase;
    public bool $lowercase;
    public bool $number;
    public bool $specialChars;

    protected function checkPasswordError(): void
    {
        $pw = $this->site['cpanel_password'];
        $this->uppercase    = (bool) preg_match('@[A-Z]@', $pw);
        $this->lowercase    = (bool) preg_match('@[a-z]@', $pw);
        $this->number       = (bool) preg_match('@[0-9]@', $pw);
        $this->specialChars = (bool) preg_match('@[^\w]@', $pw);
    }

    protected function validatePasswordStrength(): bool
    {
        $this->checkPasswordError();
        return $this->uppercase
            && $this->lowercase
            && $this->number
            && $this->specialChars
            && strlen($this->site['cpanel_password']) >= 8;
    }

    // --- حفظ/تعديل السجل ---
    public function save(): void
    {
        // قواعد التحقق
        $validated = $this->validate([
            'site.client_id'           => 'required|exists:clients,id',
            'site.domain_id'           => 'required|exists:domains,id',
            'site.provisioning_status' => ['required', Rule::in($this->provisioningStatuses)],
            'site.cpanel_username'     => 'required|string|max:255',
            'site.cpanel_password'     => 'required|string|max:255',
            'site.cpanel_url'          => 'required|url|max:255',
            'site.provisioned_at'      => [
                Rule::requiredIf(fn() => $this->site['provisioning_status'] === 'active'),
                'nullable',
                'date',
            ],
        ]);

        $data = $validated['site'];

        if ($this->siteId) {
            // تعديل
            $site = Site::findOrFail($this->siteId);

            // إذا غير المستخدم كلمة المرور، نتحقق من قوتها
            if ($site->cpanel_password !== $data['cpanel_password'] && ! $this->validatePasswordStrength()) {
                $this->showAlert(
                    'Password must be ≥8 chars, include uppercase, number & special char.',
                    'warning'
                );
                return;
            }

            $site->update($data);
            $this->showAlert('Site updated successfully.', 'success');
        } else {
            // إنشاء جديد: نرجع فحص كلمة المرور قبل الإدراج
            if (! $this->validatePasswordStrength()) {
                $this->showAlert(
                    'Password must be ≥8 chars, include uppercase, number & special char.',
                    'warning'
                );
                return;
            }

            $site = Site::create($data);
            $this->showAlert('Site added successfully.', 'success');
        }

        // جدولة Job لإنشاء الحساب على السيرفر بعد الرد على المستخدم
        ProvisionHosting::dispatchAfterResponse($site->id);

        $this->resetForm();
        $this->resetPage();
        $this->mode = 'index';
    }

    // إذا اخترنا الحالة active، نملأ تلقائياً تاريخ provisioned_at
    public function updatedSiteProvisioningStatus(string $value): void
    {
        if ($value === 'active') {
            $this->site['provisioned_at'] = now()->format('Y-m-d\TH:i');
        }
    }

    // حذف السجل
    public function delete(int $id): void
    {
        Site::findOrFail($id)->delete();
        $this->showAlert('Site deleted successfully.', 'success');
        $this->resetPage();
    }

    // إعادة تهيئة الصفحة عند تغيير البحث أو عدد الصفوف
    public function updateSearch(): void
    {
        $this->resetPage();
    }

    public function updatePerPage(): void
    {
        $this->resetPage();
    }

    // عرض البيانات
    public function render()
    {
        $sites = Site::query()
            ->when($this->search, fn($q) => $q->where('cpanel_username', 'like', "%{$this->search}%"))
            ->paginate($this->perPage);

        return view('livewire.site', compact('sites'));
    }
}
