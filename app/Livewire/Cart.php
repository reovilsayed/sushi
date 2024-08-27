<?php

namespace App\Livewire;

use App\Models\Extra;
use Livewire\Component;
use Cart as CartFacade;

class Cart extends Component
{
    public $extras;

    public const CHOPSTICK = 5;

    public $cartForExtras = ['totalQty' => 0, 'chopstickQty' => 0];
    protected $total = 0;
    public function mount()
    {

        $this->extras =  Extra::latest()->where('type', 'cart')->get();
        foreach ($this->extras as $extra) {
            $this->cartForExtras[$extra->id] = ['qty' => 0,'unit'=>$extra->price ,'total' => 0];
        }
        $this->total =  CartFacade::getTotal();
    }

    public function addExtra($id)
    {
        ++$this->cartForExtras[$id]['qty'];
        if ($id == $this::CHOPSTICK) {
            ++$this->cartForExtras['chopstickQty'];
        } {
            ++$this->cartForExtras['totalQty'];
        }
        $this->incrementExtraPrice($id);
    }
    public function removeExtra($id)
    {
        
        if ($this->cartForExtras[$id]['qty'] > 0 && $this->cartForExtras['totalQty'] > 0) {
            --$this->cartForExtras[$id]['qty'];
            if ($id == $this::CHOPSTICK) {
                if ($this->cartForExtras['chopstickQty'] > 0) {
                    --$this->cartForExtras['chopstickQty'];
                }
            } {
                --$this->cartForExtras['totalQty'];
            }
        }
        $this->decrementExtraPrice($id);
    }

    public function incrementExtraPrice($id)
    {
        if ($id == $this::CHOPSTICK) {
            $totalFreeItem = 15;
            if ($this->cartForExtras['chopstickQty'] > $totalFreeItem) {
                $this->cartForExtras[$id]['total'] += $this->cartForExtras[$id]['unit'];
            }
        } else {
            $totalFreeItem = round($this->total) / 10;
            
            if ($this->cartForExtras['totalQty'] > $totalFreeItem) {
                $this->cartForExtras[$id]['total'] += $this->cartForExtras[$id]['unit'];
            }
        }
    }
    public function decrementExtraPrice($id)
    {
        if ($id == $this::CHOPSTICK) {
            $totalFreeItem = 15;
            if ($this->cartForExtras['chopstickQty'] <= $totalFreeItem) {
                $this->cartForExtras[$id]['total'] -= $this->cartForExtras[$id]['unit'];
            }
        } else {
            $totalFreeItem = round($this->total) / 10;
            if ($this->cartForExtras['totalQty'] < $totalFreeItem) {
                $this->cartForExtras[$id]['total'] -= $this->cartForExtras[$id]['unit'];
            }
        }
    }
    public function render()
    {
        return view('livewire.cart');
    }
}
