<?php

return [
    'common' => [
        'actions' => 'العمليات',
        'create' => 'إنشاء',
        'edit' => 'تعديل',
        'update' => 'حفظ التعديلات',
        'new' => 'جديد',
        'cancel' => 'إلغاء',
        'attach' => 'أضافة',
        'detach' => 'إزالة',
        'save' => 'حفظ',
        'delete' => 'حذف',
        'delete_selected' => 'حذف المحدد',
        'search' => 'بحث',
        'back' => 'رجوع إلى القائمة',
        'are_you_sure' => 'هل انت متأكد؟',
        'no_items_found' => 'لاتوجد عناصر',
        'created' => 'تم الانشاء بنجاح',
        'saved' => 'تم الحفظ بنجاح',
        'removed' => 'تم الحذف بنجاح',
    ],

    'issues' => [
        'name' => 'أذونات صرف',
        'index_title' => 'قائمة أذونات الصرف',
        'new_title' => 'إذن صرف جديد',
        'create_title' => 'انشاء إذن صرف',
        'edit_title' => 'تعديل إذن صرف',
        'show_title' => 'عرض إذن صرف',
        'inputs' => [
            'date' => 'التاريخ',
            'number' => 'الرقم الاشاري',
            'order_id' => 'طلبات الاقسام',
        ],
    ],

    'items' => [
        'name' => 'الاصناف',
        'index_title' => 'قائمة الاصناف',
        'new_title' => 'صنف جديد',
        'create_title' => 'اضافة صنف',
        'edit_title' => 'تعديل صنف',
        'show_title' => 'عرض الصنف',
        'inputs' => [
            'code' => 'الرمز',
            'name' => 'اسم الصنف',
            'type' => 'النوع',
            'color' => 'اللون',
            'quantity' => 'الكمية',
            'required_quantity' => 'الكمية المطلوبة',
            'existing_quantity' => 'الكمية الموجودة',
            'issued_quantity' => 'الكميةالمصروفة',
            'description' => 'الوصف',
            'ex_date' => 'تارخ انتهاء الصلاحية',
        ],
    ],

    'offices' => [
        'name' => 'المكاتب',
        'index_title' => 'قائمة المكاتب',
        'new_title' => 'مكتب جديد',
        'create_title' => 'انشاء مكتب',
        'edit_title' => 'تعديل مكتب',
        'show_title' => 'عرض مكتب',
        'inputs' => [
            'name' => 'الإسم',
            'phone' => 'رقم الهاتف',
            'location' => 'الموقع',
        ],
    ],

    'users' => [
        'name' => 'الموظفين',
        'index_title' => 'قائمة الموظفين',
        'new_title' => 'موظف جديد',
        'create_title' => 'انشاء موظف',
        'edit_title' => 'تعديل موظف',
        'show_title' => 'عرض موظف',
        'inputs' => [
            'name' => 'الإسم',
            'email' => 'البريد الالكتروني',
            'phone' => 'رقم الهاتف',
            'gender' => 'الجنس',
            'address' => 'العنوان',
            'password' => 'كلمة المرور',
        ],
    ],

    'invoices' => [
        'name' => 'الفواتير',
        'index_title' => 'قائمة الفواتير',
        'new_title' => 'فاتورة جديد',
        'create_title' => 'انشاء فاتورة',
        'edit_title' => 'تعديل فاتورة',
        'show_title' => 'عرض فاتورة',
        'inputs' => [
            'number' => 'الرقم',
            'type' => 'النوع',
        ],
    ],

    'invoice_items' => [
        'name' => 'اصناف الفاتورة',
        'index_title' => 'قائمة اصناف الفاتورة',
        'new_title' => 'صنف جديد',
        'create_title' => 'انشاء صنف',
        'edit_title' => 'تعديل صنف',
        'show_title' => 'عرض صنف',
        'inputs' => [
            'item_id' => 'الصنف',
            'quantity' => 'الكمية',
        ],
    ],
    'orders' => [
        'name' => 'الطلبات',
        'index_title' => 'قائمة الطلبات',
        'new_title' => 'طلب جديد',
        'create_title' => 'إنشاء طلب',
        'edit_title' => 'تعديل طلب',
        'show_title' => 'عرض طلب',
        'inputs' => [
            'number' => 'الرقم الاشاري',
            'status' => 'حالة الطلب',        
            'created_at' => 'التاريخ',
            'office_id' => 'المكنب',
            'user_id' => 'صدر عن',
        ],
    ],

    'order_items' => [
        'name' => 'اصناف الطلب',
        'index_title' => 'قائمة اصناف الطلب',
        'new_title' => 'صنف جديد',
        'create_title' => 'انشاء صنف',
        'edit_title' => 'تعديل صنف',
        'show_title' => 'عرض صنف',
        'inputs' => [
            'item_id' => 'الصنف',
            'quantity' => 'الكمية',
        ],
    ],

    'roles' => [
        'name' => 'الادوار',
        'index_title' => 'الادوار قائمة',
        'create_title' => 'انشاء دور',
        'edit_title' => 'تعديل دور',
        'show_title' => 'عرض دور',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],

    'permissions' => [
        'name' => 'الصلاحيات',
        'index_title' => 'الصلاحيات قائمة',
        'create_title' => 'انشاء صلحية',
        'edit_title' => 'تعديل صلحية',
        'show_title' => 'عرض صلحية',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],

];
