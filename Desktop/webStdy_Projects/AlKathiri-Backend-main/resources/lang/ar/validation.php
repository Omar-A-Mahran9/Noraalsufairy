<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'يجب قبول ( :attribute )',
    'active_url'           => '( :attribute ) لا يُمثّل رابطًا صحيحًا',
    'after'                => 'يجب على ( :attribute ) أن يكون تاريخًا لاحقًا للتاريخ :date',
    'after_or_equal'       => '( :attribute ) يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date',
    'alpha'                => 'يجب أن لا يحتوي ( :attribute ) سوى على حروف',
    'alpha_dash'           => 'يجب أن لا يحتوي ( :attribute ) سوى على حروف، أرقام ومطّات',
    'alpha_num'            => 'يجب أن يحتوي ( :attribute ) على حروف وأرقامٍ فقط ولا يحتوي علي مسافات',
    'array'                => 'يجب أن يكون ( :attribute ) ًمصفوفة',
    'before'               => 'يجب على ( :attribute ) أن يكون تاريخًا سابقًا للتاريخ :date',
    'before_or_equal'      => '( :attribute ) يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) بين :min و :max',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) بين :min و :max كيلوبايت',
        'string'  => 'يجب أن يكون عدد حروف النّص ( :attribute ) بين :min و :max',
        'array'   => 'يجب أن يحتوي ( :attribute ) على عدد من العناصر بين :min و :max',
    ],
    'boolean'              => 'يجب أن تكون قيمة ( :attribute ) إما true أو false ',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل ( :attribute )',
    'date'                 => '( :attribute ) ليس تاريخًا صحيحًا',
    'date_format'          => 'لا يتوافق ( :attribute ) مع الشكل :format',
    'different'            => 'يجب أن يكون الحقلان ( :attribute ) و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي ( :attribute ) على :digits رقمًا/أرقام',
    'digits_between'       => 'يجب أن يحتوي ( :attribute ) بين :min و :max رقمًا/أرقام ',
    'dimensions'           => 'الـ ( :attribute ) يحتوي على أبعاد صورة غير صالحة',
    'distinct'             => 'للحقل ( :attribute ) قيمة مُكرّرة',
    'email'                => 'يجب أن يكون ( :attribute ) عنوان بريد إلكتروني صحيح البُنية',
    'exists'               => 'القيمة المحددة ( :attribute ) غير موجودة',
    'file'                 => 'الـ ( :attribute ) يجب أن يكون ملفا',
    'filled'               => '( :attribute ) إجباري',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) أكبر من :value',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) أكبر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص ( :attribute ) أكثر من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي ( :attribute ) على أكثر من :value عناصر/عنصر',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أكبر من :value',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) على الأقل :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النص ( :attribute ) على الأقل :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي ( :attribute ) على الأقل على :value عُنصرًا/عناصر',
    ],
    'image'                => 'يجب أن يكون ( :attribute ) صورةً',
    'in'                   => '( :attribute ) غير موجود',
    'in_array'             => '( :attribute ) غير موجود في :other',
    'integer'              => 'يجب أن يكون ( :attribute ) عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون ( :attribute ) عنوان IP صحيحًا',
    'ipv4'                 => 'يجب أن يكون ( :attribute ) عنوان IPv4 صحيحًا',
    'ipv6'                 => 'يجب أن يكون ( :attribute ) عنوان IPv6 صحيحًا',
    'json'                 => 'يجب أن يكون ( :attribute ) نصآ من نوع JSON',
    'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) أصغر من :value',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) أصغر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص ( :attribute ) أقل من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي ( :attribute ) على أقل من :value عناصر/عنصر',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أصغر من :value',
        'file'    => 'يجب أن لا يتجاوز حجم الملف ( :attribute ) :value كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص ( :attribute ) :value حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي ( :attribute ) على أكثر من :value عناصر/عنصر',
    ],
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أصغر من :max',
        'file'    => 'يجب أن لا يتجاوز حجم الملف ( :attribute ) :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص ( :attribute ) :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي ( :attribute ) على أكثر من :max عناصر/عنصر',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أكبر من :min',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) على الأقل :min كيلوبايت',
        'string'  => 'يجب أن يكون طول النص ( :attribute ) على الأقل :min حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي ( :attribute ) على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in'               => '( :attribute ) موجود',
    'not_regex'            => 'صيغة ( :attribute ) غير صحيحة',
    'numeric'              => 'يجب على ( :attribute ) أن يكون رقمًا',
    'present'              => 'يجب تقديم ( :attribute )',
    'regex'                => 'صيغة ( :attribute ) .غير صحيحة',
    'required'             => 'حقل ( :attribute ) مطلوب',
    'required_if'          => '( :attribute ) مطلوب في حال ما إذا كان :other يساوي :value',
    'required_unless'      => '( :attribute ) مطلوب في حال ما لم يكن :other يساوي :values',
    'required_with'        => '( :attribute ) مطلوب إذا كان :values',
    'required_with_all'    => '( :attribute ) مطلوب إذا كان :values',
    'required_without'     => '( :attribute ) مطلوب إذا لم يكن :values',
    'required_without_all' => '( :attribute ) مطلوب إذا لم يكن :values',
    'same'                 => 'يجب أن يتطابق ( :attribute ) مع :other',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية لـ :size',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) :size كيلوبايت',
        'string'  => 'يجب أن يحتوي النص ( :attribute ) على :size حروفٍ/حرفًا بالضبط',
        'array'   => 'يجب أن يحتوي ( :attribute ) على :size عنصرٍ/عناصر بالضبط',
    ],
    'string'               => 'يجب أن يكون ( :attribute ) نصآ',
    'timezone'             => 'يجب أن يكون ( :attribute ) نطاقًا زمنيًا صحيحًا',
    'unique'               => 'قيمة ( :attribute ) مُستخدمة من قبل',
    'uploaded'             => 'فشل في تحميل الـ ( :attribute )',
    'url'                  => 'صيغة الرابط ( :attribute ) غير صحيحة',
    'uuid'                 => '( :attribute ) يجب أن يكون بصيغة UUID سليمة',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [

        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'abilities' => [
            'required' => 'صلاحيات الوظيفة مطلوبة'
        ],
        'phone' => [
            'regex' => 'رقم الهاتف يجب ان يبدأ ب 05 متبوعاً ب 8 ارقام '
        ],
        'salary' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'commitments' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'having_loan' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'having_personal_loan' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'finance_duration' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'last_installment' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'first_installment' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'work' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'age' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'organization_name' => [
            'required' => 'حقل ( :attribute ) مطلوب'
        ],
        'bank_id' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'driving_license' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'city_id' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        '*.start_time' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        '*.end_time' => [
            'required_if' => 'حقل ( :attribute ) مطلوب',
            'after' => 'يجب على ( :attribute ) أن يكون وقتاً لاحقًا لوقت :date'
        ],
        'time' => [
            'required_if' => 'يجب تحديد موعد الحجز',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */


    'attributes' => [
        'car_id' => 'السيارة',
        'color_id' => 'اللون',
        'age' => 'العمر',
        'finance' => 'تمويل',
        'email' => 'البريد الإلكتروني',
        'phone' => 'الهاتف',
        'name_en' => 'الإسم باللغة الإنجليزية',
        'name_ar' => 'الاسم باللغة العربيه',
        'password' =>'كلمة المرور',
        'password_confirmation' =>'تأكيد كلمة المرور',
        'phone_number' =>'رقم الهاتف',
        'image' => 'الصورة' ,
        'address_en' => 'العنوان باللغة الانجليزية' ,
        'address_ar' => 'العنوان باللغة العربية' ,
        'lat' => 'العنوان من الخريطه',
        'lng' => 'العنوان من الخريطه',
        'brand_id' => 'العلامة التجارية ',
        'model_id' => 'الموديل الأساسي',
        'sub_model_id' => 'الموديل الفرعي',
        'year' => 'العام',
        'card_description_ar' => 'وصف قصير بالعربية',
        'card_description_en' => 'وصف قصير بالأنجليزية',
        'cars.*.description_ar' => 'الوصف بالعربية',
        'description_ar' => 'الوصف بالعربية',
        'cars.*.description_en' => 'الوصف بالانجليزية',
        'description_en' => 'الوصف بالانجليزية',
        'video_url' => 'رابط الفيديو',
        'cars.*.price' => 'السعر',
        'price' => 'السعر',
        'cars.*.discount_price' => 'السعر بعد التخفيض',
        'discount_price' => 'السعر بعد التخفيض',
        'cars.*.price_field_status' => 'حقل السعر في الموقع',
        'price_field_status' => 'حقل السعر في الموقع',
        'tax_on_exhibition' => 'الضريبة علي المعرض',
        'tax' => 'الضريبة',
        'low_price' => 'سيارة مخفضة',
        'model_name' => 'اسم الموديل',
        'model_year' => 'سنة الصنع',
        'supplier' => 'المورد',
        'status' => 'الحالة',
        'is_new' => 'حالة السيارة',
        'cars.*.main_image' => 'الصورة الرئيسية',
        'main_image' => 'الصورة الرئيسية',
        'cars.*.cover_image' => 'صورة الغلاف',
        'cover_image' => 'صورة الغلاف',
        'cover' => 'صورة الغلاف',
        'cars.*.share_image' => 'صورة المشاركة',
        'share_image' => 'صورة المشاركة',
        'cars.*.colors' => 'الألوان',
        'colors' => 'الألوان',
        'cars.*.other_text_ar' => 'النص بالعربية',
        'other_text_ar' => 'النص بالعربية',
        'cars.*.other_text_en' => 'النص بالانجليزية',
        'other_text_en' => 'النص بالانجليزية',
        'other' => 'اخرى',
        'colors.*.inner_images' => 'الصور الداخلية',
        'colors.*.outer_images' => 'الصور الخارجية',
        'colors.*.inner_images.*' => 'صيغة الصوره غير صحيحه',
        'colors.*.outer_images.*' => 'صيغة الصوره غير صحيحه',
        'meta_keywords_ar' => 'الكلمات الدلالية لمحرك البحث بالعربية',
        'meta_keywords_en' => 'الكلمات الدلالية لمحرك البحث بالانجليزية',
        'meta_desc_ar' => 'وصف مختصر لمحركات البحث بالعربية',
        'meta_desc_en' => 'وصف مختصر لمحركات البحث بالانجليزية',
        'cars.*.maximum_force' => 'أقصى قوة',
        'maximum_force' => 'أقصى قوة',
        'determination' => 'العزم',
        'engine_measurement' => 'قياس المحرّك',
        'cars.*.engine_type' => 'نوع المحرّك',
        'engine_type' => 'نوع المحرّك',
        'valves' => 'الصمّامات',
        'cars.*.fuel_consumption' => 'استهلاك الوقود',
        'fuel_consumption' => 'استهلاك الوقود',
        'wheels' => 'العجلات',
        'cars.*.seats_number' => 'عدد المقاعد',
        'seats_number' => 'عدد المقاعد',
        'fuel_tank_capacity' => 'سعة خزان الوقود',
        'speakers_number' => 'عدد السماعات',
        'driving_mode' => 'وضع القيادة',
        'car_style' => 'نوع المركبة',
        'cars.*.traction_type' => 'نوع الجر',
        'traction_type' => 'نوع الجر',
        'cars.*.Motion_vector' => 'ناقل الحركة',
        'Motion_vector' => 'ناقل الحركة',
        'turbo' => 'تيربو',
        'engine_system' => 'نظام المحرك',
        'steering_wheel' => 'المقود',
        'eco_boost' => '',
        'wheel_shifters' => 'مبدّل للسرعات على عجلة القيادة',
        'bright_lights_during_the_day' => 'أضواء ساطعة خلال النهار',
        'fog_lights' => 'أضواء ضباب',
        'headlights' => 'مصابيح أمامية',
        'smart_entry_system' => 'نظام الدخول الذكي',
        'chrome_door_handles' => 'مقابض الأبواب من الكروم',
        'rear_parking_sensors' => 'حساسات خلفية لصف السيارة',
        'front_parking_sensors' => 'حساسات أمامية لصف السيارة',
        'one_touch_electric_sunroof' => 'فتحة سقف كهربائية بلمسة واحدة',
        'electrical_side_mirrors' => 'مرايا جانبية كهربائية',
        'chrome_side_mirrors' => 'مرايا جانبية من الكروم',
        'automatic_trunk_door' => 'باب صندوق آلي',
        'led_backlight_lights' => 'أضواء خلفية LED',
        'rear_suite' => 'جناح خلفي',
        'panorama_roof' => 'سقف بانوراما',
        'remote_engine_start' => 'تشغيل المحرّك عن بُعد',
        'electric_hand_brakes' => 'فرامل يد كهربائية',
        'ac_in_second_row_seats' => 'فتحات للتكييف في صف المقاعد الثاني',
        'engine_start_button' => 'زر لتشغيل المحرّك',
        'cruise_control' => 'نظام تثبيت السرعة',
        'leather_steering_wheel' => 'عجلة قيادة مغلّفة بالجلد',
        'cars.*.upholstered_seats' => 'تنجيد المقاعد',
        'upholstered_seats' => 'تنجيد المقاعد',
        'cars.*.car_style' => 'نوع المركبة',
        'car_style' => 'نوع المركبة',
        'driver_seat_adjustment' => 'تعديل حركة مقعد السائق',
        'passenger_seat_movement' => 'تعديل حركة مقعد الراكب الأمامي',
        'heated_seats' => 'مقاعد مدفأة',
        'airy_seats' => 'مقاعد مهواة',
        'navigation_system' => 'نظام ملاحي',
        'info_screen' => 'شاشة معلومات',
        'back_screen' => 'شاشة ترفيه في الخلف',
        'cd' => 'اقراص مدمجة',
        'bluetooth' => 'بلوتوث',
        'mp3' => 'MP3/مدخل اضافي',
        'usb_audio_system' => 'واجهة بيانية USB النظام الصوتي',
        'apple_carplay_android_auto' => 'نظام آبل كاربلاي وأندرويد أوتو',
        'hdmi' => 'واجهة HDMI',
        'wireless_charger' => 'شاحن لاسلكي للهاتف الخلوي',
        'front_airbags' => 'وسائد هوائية أمامية',
        'side_airbags' => 'وسائد هوائية جانبية',
        'knee_airbags' => 'وسائد هوائية لحماية ركب السائق والراكب الأمامي',
        'side_curtains' => 'ستائر هوائية جانبية',
        'rear_camera' => 'كاميرا للرؤية ( متعددة الزوايا )',
        'vsa' => 'نظام المساعدة في ثبات السيارة (VSA)',
        'abs' => 'نظام الفرامل المانعة للانغلاق (ABS)',
        'ebd' => 'نظام التوزيع الإلكتروني لقوة الفرامل (EBD)',
        'ess' => 'إشارة للتوقف الطارئ (ESS)',
        'ebb' => 'نظام الدعم الإلكتروني لقوة الفرامل (EBB)',
        'tpms' => 'نظام مراقبة ضغط الهواء في الإطارات (TPMS)',
        'hsa' => 'نظام المساعدة للانطلاق على المنحدرات (HSA)',
        'ace' => 'بنية الهيكل بتقنية الهندسة المتوافقة (ACE™)',
        'track_control_system' => 'نظام مراقبة المسار',
        'display_info_on_windshield' => 'عرض المعلومات على الزجاج الامامي',
        'acc' => 'نظام تثبيت السرعة المتكيف (ACC)',
        'rdm' => 'نظام الحد من مغادرة الطريق (RDM)',
        'fcw' => 'تحذير من الاصطدامات الأمامية (FCW)',
        'blind_spots' => 'معلومات عن النقاط غير المرئية (النقط العمياء)',
        'lsf' => 'نظام التتابع على السرعات المنخفضة (LSF)',
        'back_traffic_alert' => 'تنبيه حركة المرور الخلفية',
        'name' => 'الأسم',
        'address' => 'العنوان',
        'title' => 'العنوان',
        'short_description' => 'وصف مختصر',
        'long_description' => 'الوصف',
        'city_id' => 'المدينة',
        'tags' => 'الوسوم',
        'description' => 'الوصف',
        'question' => 'السؤال',
        'answer' => 'الأجابة',
        'title_ar' => 'العنوان بالعربية',
        'title_en' => 'العنوان بالانجليزية',
        'cars' => 'السيارات',
        'whatsapp' => 'واتس آب',
        'roles' => 'الصلاحيات والادوار',
        'website_name_ar' => 'اسم الموقع بالعربية',
        'website_name_en' => 'اسم الموقع بالانجليزية',
        'facebook_url' => 'رابط فيسبوك',
        'twitter_url' => 'رابط تويتر',
        'instagram_url' => 'رابط انستجرام',
        'youtube_url' => 'رابط قناة اليوتيوب',
        'snapchat_url' => 'رابط سناب شات',
        'logo' => 'اللوجو',
        'favicon' => 'ايقونة الموقع',
        'setting_type' => 'نوع الاعدادات',
        'meta_tag_description_ar' => 'وصف مختصر بالعربية',
        'meta_tag_description_en' => 'وصف مختصر بالانجليزية',
        'meta_tag_keyword_ar' => 'كلمات دلالية بالعربية',
        'meta_tag_keyword_en' => 'كلمات دلالية بالانجليزية',
        'privacy_policy_ar' => 'سياسة الخصوصية بالعربية',
        'privacy_policy_en' => 'سياسة الخصوصية بالانجليزية',
        'about_us_ar' => 'عن موقعك بالعربية',
        'about_us_en' => 'عن موقعك بالانجليزية',
        'terms_and_conditions_en' => 'الشروط والاحكام بالانجليزية',
        'terms_and_conditions_ar' => 'الشروط والاحكام بالعربية',
        'show_in_home_page' => 'عرض في الصفحة الرئيسية',
        'cars.*.car_name' => 'اسم السيارة' ,
        'car_name' => 'اسم السيارة' ,
        'cars.*.count' => 'العدد' ,
        'count' => 'العدد' ,
        'about_us_video_url' => 'كود الفيديو',
        'purchase_order_text_in_home_page_ar' => 'نص قسم طلب شراء في الصفحة الرئيسية بالعربية',
        'purchase_order_text_in_home_page_en' => 'نص قسم طلب شراء في الصفحة الرئيسية بالانجليزية',
        'why_alkathiri_cars_ar' => 'لماذا الكيثيري بالعربية',
        'why_alkathiri_cars_en' => 'لماذا الكيثيري بالانجليزية',
        'why_alkathiri_cars_card_1_ar' => 'كارت 1 لماذا مواسم بالعربية',
        'why_alkathiri_cars_card_1_en' => 'كارت 1 لماذا مواسم بالانجليزيرة',
        'why_alkathiri_cars_card_2_ar' => 'كارت 2 لماذا مواسم بالعربية',
        'why_alkathiri_cars_card_2_en' => 'كارت 2 لماذا مواسم بالانجليزية',
        'why_alkathiri_cars_card_3_ar' => 'كارت 3 لماذا مواسم بالعربية',
        'why_alkathiri_cars_card_3_en' => 'كارت 3 لماذا مواسم بالانجليزية',
        'maintenance_mode' => 'وضع الاصلاحات',
        'who_alkathiri_photo' => 'صورة قسم من هم الكيثيري',
        'footer_text_ar' => 'نص التذييلة بالعربية',
        'footer_text_en' => 'نص التذييلة بالانجليزية',
        'parent_model_id' => 'الموديل الاساسي',
        'model_type' => 'نوع الموديل',
        'highlighted' => 'خبر مميز',
        'first_name' => 'الاسم الاول',
        'last_name' => 'الاسم الاخير',
        'cv' => 'السيرة الذاتية',
        'comment' => 'التعليق',
        'message' => 'الرسالة',
        'orders_statuses.*.name_ar' => 'اسم الحالة بالعربية',
        'orders_statuses.*.name_en' => 'اسم الحالة بالإنجليوية',
        'orders_statuses.*.name_color' => 'لون الحالة',
        'offer_ar' => 'العرض بالعربية',
        'offer_en' => 'العرض بالانجليزية',
        'funding_organization_id' => 'شريك التمويل',
        'funding_organization_name' => 'اسم شريك التمويل',
        "salary" => "مبلغ الراتب في الصراف",
        "commitments" => "اجمالي التزامات عليك",
        'having_loan' => 'هل يوجد قرض عقاري',
        'funding_organization_type' => 'نوع جهة التمويل',
        'having_personal_loan' => 'هل يوجد قرض شخصي',
        'finance_duration' => 'مدة التمويل',
        'first_installment' => 'الدفعة الاولى',
        'last_installment' => 'الدفعة الاخيرة',
        'driving_license' => 'رخصة القيادة',
        "work" => "قطاع العمل",
        "bank_id" => "البنك",
        'organization_name' => 'اسم الشركة',
        'organization_email' => 'الايميل الرسمي',
        'organization_ceo' => 'المدير التنفيذي',
        'organization_location' => 'مقر الشركة',
        'organization_activity' => 'نشاط الشركة',
        'organization_age' => 'عمر الشركة',
        'payment_type' => 'نوع الدفع',
        'bank_number_image' => 'صورة أرقام حسابات الشركة',
        'home_cars_section_label_ar' => 'عنوان قسم السيارات في الصفحة الرئيسية بالعربية',
        'home_cars_section_label_en' => 'عنوان قسم السيارات في الصفحة الرئيسية بالانجليزية',
        'car_name' => 'اسم السيارة',
        'date' => 'التاريخ',
        'kilometers' => 'عدد الكيلومترات',
        'available_for_test_drive' => 'متاح لاختبار القيادة',
        'slider_dashboard_username' => 'اسم مستخدم لوحة تحكم السلايدر',
        'slider_dashboard_password' => 'كلمة سر لوحة تحكم السلايدر',
        'slider_ar' => 'السلايدر العربي',
        'slider_en' => 'السلايدر الانجليزي',
        'have_discount' => 'يوجد تخفيض',
        'frame' => 'الفريم',
        'start_time' => 'موعد بداية العمل',
        'end_time' => 'موعد نهاية العمل',
        'schedules.*.start_time' => 'بداية العمل',
        'schedules.*.end_time' => 'نهاية العمل',
        'terms_and_privacy' => 'الشروط والاحكام وسياسة الخصوصية',
        'maintenance_time' => 'مدة الصيانة',
        'time' => 'الوقت',
        'branch_id' => 'الفرع',
        'cars.*.sub_model_ar' => 'الموديل الفرعي بالعربية',
        'sub_model_ar' => 'الموديل الفرعي بالعربية',
        'cars.*.sub_model_en' => 'الموديل الفرعي بالانجليزية',
        'sub_model_en' => 'الموديل الفرعي بالانجليزية',
        'id_and_driving_license' => 'الهوية ورخصة القيادة',
        'salary_identification' => 'تعريف الراتب من جهة العمل',
        'insurance_print' => 'برنت التأمينات',
        'account_statement' => 'كشف حساب اخر 3 شهور',
        'sector' => 'القطاع',
        'type' => 'نوع الفرع',
        'time_of_work_ar' => 'وقت العمل بالعربية',
        'time_of_work_en' => 'وقت العمل بالإنجليزية',
        'images' => 'صور الموديل',
        'funding_bank_id' => 'بنك التمويل',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
    ],

    'values' => [
        'from' => [
            'today' => 'اليوم',
        ],
        'use_type' => [
            'date' => 'تاريخ',
            'count' => 'عدد محدد من المستخدمين',
            'both' => 'عدد محدد من المستخدمين و تاريخ'
        ],
        'end_at' => [
            'today' => 'اليوم'
        ],
        'discount_type' => [
            'percentage' => 'نسبة مئوية'
        ],
        'type' => [
            'image' => 'صورة'
        ],
        'discount_from' => [
            'today' => 'اليوم'
        ],
        'manual_address' => [
            'address_id' => 'العنوان',
        ],
        'address_id' => [
            'manual_address' => 'العنوان اليدوي'
        ],
        'payment_method' => [
            'bank' => 'تحويل بنكي'
        ],
        'model_type' => [
            'sub' => 'فرعي'
        ],
        'setting_type' => [
            'about-website' => 'عن الموقع',
            'general' => 'عام',
            'website' => 'الموقع'
        ],
        'date' => [
            'today' => 'اليوم'
        ],
        'is_new' => [
            '0' => 'مستعمل'
        ],
        'price_field_status' => [
            'other' => 'آخر'
        ],
        'funding_organization_type' => [
            'company' => 'شريك تمويل',
            'bank' => 'بنك',
        ],
        'payment_type' => [
            'cash' => 'نقدي',
            'finance' => 'تمويل'
        ],
        'sector' => [
            'governmental' => 'حكومي',
            'private' => 'خاص',
        ],



    ]
];
