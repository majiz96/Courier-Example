<?php

namespace App\Livewire;

use Livewire\Component;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Validator;

class Test extends Component
{
    public $text = 'show';

    public string $test = '';

    public bool $show = false;

    public string $status = '';

    public $birthday;

    public $rules = [
        'birthday' => ['required', 'date', 'before_or_equal:today'],
    ];

    public $messages_en = [
        'birthday.required' => 'The birthday field is required.',
        'date' => 'The birthday field must be a date.',
        'before_or_equal' => 'The birthday must be before or equal to today.',
    ];

    public $messages_fa = [
        'birthday.required' => 'وارد کردن تاریخ تولد الزامی است.',
        'date' => 'اطلاعات وارد شده باید به شکل تاریخ باشد.',
        'before_or_equal' => 'تاریخ تولد نمی تواند امروز یا فردا باشد.',
    ];

    public function save()
    {
        $messages = session('locale') == 'fa'
            ? $this->messages_fa
            : $this->messages_en;

        // بررسی خالی نبودن تاریخ
        $this->validate([
            'birthday' => ['required'],
        ], $messages);

        $birthday = $this->birthday;

        if (session('locale') == 'fa')
        {
            $birthday = Jalalian::fromFormat('Y/m/d', $birthday)
                ->toCarbon()
                ->format('Y-m-d');
        }

        // اعتبارسنجی تاریخ میلادی
        $validator = Validator::make(
            ['birthday' => $birthday],
            [
                'birthday' => ['required', 'date', 'before_or_equal:today'],
            ],
            $messages
        );

        if ($validator->fails())
        {
            $this->setErrorBag($validator->errors());
            return;
        }

        $this->test = $birthday;
    }

    public function render()
    {
        return view('livewire.test');
    }
}
