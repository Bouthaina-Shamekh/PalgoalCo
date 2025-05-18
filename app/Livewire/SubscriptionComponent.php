<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Plan;
use App\Models\Subscription;
use Livewire\Component;
use Livewire\WithPagination;

class SubscriptionComponent extends Component
{
    use WithPagination;
    public $mode = 'index';
    public $subscription = [
      'client_id' => '',
      'plan_id'   => '',
      'starts_at' => '',
    ];
    public $editingId;

    protected $rules = [
        'subscription.client_id'     => 'required|exists:clients,id',
        'subscription.plan_id'       => 'required|exists:plans,id',
        'subscription.status'        => 'required|in:active,canceled,pending',
        'subscription.start_date'    => 'required|date',
        'subscription.end_date'      => 'nullable|date|after_or_equal:subscription.start_date',
        'subscription.domain_option' => 'required|in:new,subdomain,existing',
        'subscription.domain_name'   => 'required_if:subscription.domain_option,new,existing',
    ];

    
    public function showAdd()
    {
      $this->mode = 'add';
      $this->reset('subscription');
    }
    public function showEdit($id)
    {
      $this->mode = 'edit';
      $sub = Subscription::findOrFail($id);
      $this->subscription = [
        'client_id' => $sub->client_id,
        'plan_id'   => $sub->plan_id,
        'starts_at' => $sub->starts_at->toDateString(),
      ];
      $this->editingId = $id;
    }

    public function showIndex()
    {
      $this->mode = 'index';
    }

        public function save()
    {
      $data = $this->validate()['subscription'];
      if($this->mode === 'edit') {
        Subscription::find($this->editingId)->update($data);
      } else {
        Subscription::create($data);
      }
      $this->showIndex();
    }

        public function delete($id)
    {
      Subscription::findOrFail($id)->delete();
      $this->resetPage();
    }





    public function render()
    {
      return view('livewire.subscription', [
        'subscriptions' => Subscription::with(['client','plan'])
                                       ->paginate(10),
        'clients' => Client::all(),
        'plans'   => Plan::all(),
      ]);
    }
}
