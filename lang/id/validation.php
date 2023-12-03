<?php

return [

    /*
    |------------------------------------------------- -------------------------
    | Baris Bahasa Validasi
    |------------------------------------------------- -------------------------
    |
    | Baris bahasa berikut berisi pesan kesalahan default yang digunakan oleh
    | kelas validator. Beberapa aturan ini memiliki beberapa versi
    | sebagai aturan ukuran. Jangan ragu untuk mengubah setiap pesan ini di sini.
    |
    */

    'accepted' => 'Isian :Attribute harus diterima.',
    'accepted_if' => 'Isian :Attribute harus diterima bila :Other adalah :value.',
    'active_url' => 'Isian :Attribute harus berupa URL yang valid.',
    'after' => 'Isian :Attribute harus berupa tanggal setelah :date.',
    'after_or_equal' => 'Isian :Attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha' => 'Isian :Attribute hanya boleh berisi huruf.',
    'alpha_dash' => 'Isian :Attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => 'Isian :Attribute hanya boleh berisi huruf dan angka.',
    'array' => 'Isian :Attribute harus berupa array.',
    'ascii' => 'Isian :Attribute hanya boleh berisi karakter dan simbol alfanumerik byte tunggal.',
    'before' => 'Isian :Attribute harus berisi tanggal sebelum :date.',
    'before_or_equal' => 'Isian :Attribute harus berisi tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'Isian :Attribute harus berisi antara item :min dan :max.',
        'file' => 'Isian :Attribute harus antara :min dan :max kilobyte.',
        'numeric' => 'Isian :Attribute harus berada di antara :min dan :max.',
        'string' => 'Isian :Attribute harus berada di antara karakter :min dan :max.',
    ],
    'boolean' => 'Isian :Attribute harus benar atau salah.',
    'can' => 'Isian :Attribute berisi nilai yang tidak sah.',
    'confirmed' => 'Konfirmasi Isian :Attribute tidak cocok.',
    'current_password' => 'Kata sandi salah.',
    'date' => 'Isian :Attribute harus berupa tanggal yang valid.',
    'date_equals' => 'Isian :Attribute harus berisi tanggal yang sama dengan :date.',
    'date_format' => 'Isian :Attribute harus cocok dengan format :format.',
    'decimal' => 'Isian :Attribute harus memiliki :decimal desimal.',
    'declined' => 'Isian :Attribute harus ditolak.',
    'declined_if' => 'Isian :Attribute harus ditolak jika :Other adalah :value.',
    'different' => 'Isian :Attribute dan :Other harus berbeda.',
    'digits' => 'Isian :Attribute harus berupa :digits digit.',
    'digits_between' => 'Isian :Attribute harus berada di antara angka :min dan :max.',
    'dimensions' => 'Bagian :Attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Isian :Attribute mempunyai nilai duplikat.',
    'doesnt_end_with' => 'Isian :Attribute tidak boleh diakhiri dengan salah satu dari berikut ini: :values.',
    'doesnt_start_with' => 'Isian :Attribute tidak boleh diawali dengan salah satu dari berikut ini: :values.',
    'email' => 'Isian :Attribute harus berupa alamat email yang valid.',
    'ends_with' => 'Isian :Attribute harus diakhiri dengan salah satu dari yang berikut: :values.',
    'enum' => ' :Atribut yang dipilih tidak valid.',
    'exists' => ' :Atribut yang dipilih tidak valid.',
    'file' => 'Isian :Attribute harus berupa file.',
    'filled' => 'Isian :Attribute harus mempunyai nilai.',
    'gt' => [
        'array' => 'Isian :Attribute harus berisi lebih dari :value item.',
        'file' => 'Isian :Attribute harus lebih besar dari :value kilobytes.',
        'numeric' => 'Isian :Attribute harus lebih besar dari :value.',
        'string' => 'Isian :Attribute harus lebih besar dari karakter :value.',
    ],
    'gte' => [
        'array' => 'Isian :Attribute harus berisi item :value atau lebih.',
        'file' => 'Isian :Attribute harus lebih besar atau sama dengan :value kilobyte.',
        'numeric' => 'Isian :Attribute harus lebih besar atau sama dengan :value.',
        'string' => 'Isian :Attribute harus lebih besar atau sama dengan karakter :value.',
    ],
    'image' => 'Isian :Attribute harus berupa gambar.',
    'in' => ' :Atribut yang dipilih tidak valid.',
    'in_array' => 'Isian :Attribute harus ada di :Other.',
    'integer' => 'Isian :Attribute harus berupa bilangan bulat.',
    'ip' => 'Isian :Attribute harus berupa alamat IP yang valid.',
    'ipv4' => 'Isian :Attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'Isian :Attribute harus berupa alamat IPv6 yang valid.',
    'json' => 'Isian :Attribute harus berupa string JSON yang valid.',
    'lowercase' => 'Isian :Attribute harus menggunakan huruf kecil.',
    'lt' => [
        'array' => 'Isian :Attribute harus berisi kurang dari :value item.',
        'file' => 'Isian :Attribute harus kurang dari :value kilobytes.',
        'numeric' => 'Isian :Attribute harus kurang dari :value.',
        'string' => 'Isian :Attribute harus kurang dari :value karakter.',
    ],
    'lte' => [
        'array' => 'Isian :Attribute tidak boleh berisi lebih dari :value item.',
        'file' => 'Isian :Attribute harus kurang dari atau sama dengan :value kilobyte.',
        'numeric' => 'Isian :Attribute harus lebih kecil atau sama dengan :value.',
        'string' => 'Isian :Attribute harus kurang dari atau sama dengan karakter :value.',
    ],
    'mac_address' => 'Isian :Attribute harus berupa alamat MAC yang valid.',
    'max' => [
        'array' => 'Isian :Attribute tidak boleh berisi lebih dari :max item.',
        'file' => 'Isian :Attribute tidak boleh lebih besar dari :max kilobyte.',
        'numeric' => 'Isian :Attribute tidak boleh lebih besar dari :max.',
        'string' => 'Isian :Attribute tidak boleh lebih besar dari :max karakter.',
    ],
    'max_digits' => 'Isian :Attribute tidak boleh lebih dari :max digit.',
    'mimes' => 'Isian :Attribute harus berupa file dengan tipe: :values.',
    'mimetypes' => 'Isian :Attribute harus berupa file dengan tipe: :values.',
    'min' => [
        'array' => 'Isian :Attribute harus memiliki setidaknya :min item.',
        'file' => 'Isian :Attribute minimal harus :min kilobyte.',
        'numeric' => 'Isian :Attribute minimal harus :min.',
        'string' => 'Isian :Attribute minimal harus berisi :min karakter.',
    ],
    'min_digits' => 'Isian :Attribute harus berisi setidaknya :min digit.',
    'missing' => 'Isian :Attribute harus hilang.',
    'missing_if' => 'Isian :Attribute harus hilang jika :Other adalah :value.',
    'missing_unless' => 'Isian :Attribute harus hilang kecuali :Other adalah :value.',
    'missing_with' => 'Isian :Attribute harus hilang jika :values ada.',
    'missing_with_all' => 'Isian :Attribute harus hilang jika :values ada.',
    'multiple_of' => 'Isian :Attribute harus kelipatan :value.',
    'not_in' => 'Atribut yang dipilih tidak valid.',
    'not_regex' => 'Format Isian :Attribute tidak valid.',
    'numeric' => 'Isian :Attribute harus berupa angka.',
    'password' => [
        'letters' => 'Isian :Attribute harus berisi setidaknya satu huruf.',
        'mixed' => 'Isian :Attribute harus berisi setidaknya satu huruf besar dan satu huruf kecil.',
        'numbers' => 'Isian :Attribute harus berisi setidaknya satu angka.',
        'symbols' => 'Isian :Attribute harus berisi setidaknya satu simbol.',
        'uncompromised' => ' :Attribute yang diberikan telah muncul dalam kebocoran data. Silakan pilih :atribut yang lain.',
    ],
    'present' => 'Isian :Attribute harus ada.',
    'prohibited' => 'Isian :Attribute dilarang.',
    'prohibited_if' => 'Isian :Attribute dilarang jika :Other adalah :value.',
    'prohibited_unless' => 'Isian :Attribute dilarang kecuali :Other ada di :values.',
    'prohibits' => 'Isian :Attribute melarang :Other untuk ada.',
    'regex' => 'Format Isian :Attribute tidak valid.',
    'required' => 'Isian :Attribute wajib diisi.',
    'required_array_keys' => 'Isian :Attribute harus berisi entri untuk: :values.',
    'required_if' => 'Isian :Attribute wajib diisi bila :Other adalah :value.',
    'required_if_accepted' => 'Isian :Attribute wajib diisi jika :Other diterima.',
    'required_unless' => 'Isian :Attribute wajib diisi kecuali :Other ada di :values.',
    'required_with' => 'Isian :Attribute wajib diisi bila :values ada.',
    'required_with_all' => 'Isian :Attribute diperlukan jika :values ada.',
    'required_without' => 'Isian :Attribute diperlukan bila :values tidak ada.',
    'required_without_all' => 'Isian :Attribute wajib diisi jika :values tidak ada.',
    'same' => 'Isian :Attribute harus cocok dengan :Other.',
    'size' => [
        'array' => 'Isian :Attribute harus berisi item :size.',
        'file' => 'Isian :Attribute harus :ukuran kilobyte.',
        'numeric' => 'Isian :Attribute harus :ukuran.',
        'string' => 'Isian :Attribute harus berisi :karakter ukuran.',
    ],
    'starts_with' => 'Isian :Attribute harus diawali dengan salah satu dari yang berikut: :values.',
    'string' => 'Isian :Attribute harus berupa string.',
    'timezone' => 'Isian :Attribute harus berupa zona waktu yang valid.',
    'unique' => ' :Attribute sudah dipakai.',
    'uploaded' => ' :Attribute gagal diunggah.',
    'uppercase' => 'Isian :Attribute harus menggunakan huruf besar.',
    'url' => 'Isian :Attribute harus berupa URL yang valid.',
    'ulid' => 'Isian :Attribute harus berupa ULID yang valid.',
    'uuid' => 'Isian :Attribute harus berupa UUID yang valid.',

    /*
    |------------------------------------------------- -------------------------
    | Baris Bahasa Validasi Kustom
    |------------------------------------------------- -------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi khusus untuk atribut menggunakan
    | konvensi "atribut.rule" untuk memberi nama baris. Ini membuatnya cepat
    | tentukan baris bahasa khusus tertentu untuk aturan atribut tertentu.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |------------------------------------------------- -------------------------
    | Atribut Validasi Kustom
    |------------------------------------------------- -------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar placeholder atribut kami
    | dengan sesuatu yang lebih ramah pembaca seperti "Alamat Email".
    | dari "email". Ini hanya membantu kami membuat pesan kami lebih ekspresif.
    |
    */

    'attributes' => [],

];
