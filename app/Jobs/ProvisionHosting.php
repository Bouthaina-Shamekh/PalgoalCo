<?php

namespace App\Jobs;

use App\Models\Site;
use App\Services\ProvisioningService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ProvisionHosting implements ShouldQueue
{
    use Dispatchable, Queueable;
    protected int $siteId;

    /**
     * Create a new job instance.
     */
    public function __construct(int $siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * Execute the job.
     */
    public function handle(ProvisioningService $service): void
    {
        $site = Site::findOrFail($this->siteId);

        $result = $service->createAccount(
            $site->domain->domain_name,
            $site->cpanel_username,
            $site->cpanel_password,
            'your_whm_package_name'
        );

         // cPanel API يعيد result=1 للنجاح و 0 للفشل
        $apiResult = data_get($result, 'metadata.result', 0);

        if ($apiResult === 1) {
        // نجاح
        $site->update([
            'provisioning_status' => 'active',
            'provisioned_at'      => now(),
        ]);
    } else {
        // فشل
        $site->update([
            'provisioning_status' => 'failed',
        ]);
        Log::error('Provisioning failed', $result);
    }
    }
}
