<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'official' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:18'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:companies']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Firma adı boş bırakılamaz.',
            'name.string' => 'Firma adı harflerden ve sayılardan oluşabilir.',
            'name.max' => 'Firma adı en fazla :max karakter içerebilir.',
            'address.required' => 'Firma adresi boş bırakılamaz.',
            'address.string' => 'Firma adresi harflerden ve sayılardan oluşabilir.',
            'official.required' => 'Yetkili adı boş bırakılamaz.',
            'official.string' => 'Yetkili adı harflerden ve sayılardan oluşabilir.',
            'official.max' => 'Yetkili adı en fazla :max karakter içerebilir.',
            'phone_number.required' => 'Telefon numarası boş bırakılamaz.',
            'phone_number.string' => 'Lütfen geçerli bir telefon numarası giriniz.',
            'phone_number.max' => 'Telefon numarası en fazla :max karakter içerebilir.',
            'email.required' => 'E-posta boş bırakılamaz.',
            'email.string' => 'Lütfen geçerli bir e-posta giriniz.',
            'email.max' => 'E-posta en fazla :max karakter içerebilir.',
            'email.email' => 'Lütfen geçerli bir e-posta giriniz.',
            'email.unique' => 'Bu e-posta ile birlikte bir firma kaydı zaten var. Teklif oluşturma adımından seçim yapabilirsiniz.',
        ];
    }
}
