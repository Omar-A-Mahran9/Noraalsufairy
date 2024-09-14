<?php

namespace App\Traits;

use App\Models\Doctor;
use App\Models\Appointment;

trait NotificationTrait
{
    protected function newAppointmentNotification($appointment)
    {
        if ($appointment) {
            $titleAr = "موعد صيانة جديد";
            $titleEn = "New Maintenance Appointment";
            $messageAr = "تم حجز موعد صيانة جديد بتاريخ " .  $appointment->date->format('Y-m-d') . " الساعة " . $appointment->time->translatedFormat('h:i A') . " اضغط لعرض التفاصيل";
            $messageEn = "A new maintenance appointment has been booked in " .  $appointment->date->format('Y-m-d') . " at " . $appointment->time->translatedFormat('h:i A') . " Click to view details";
            $icon = '<i class="fa-solid fa-car-bolt"></i>';
            $color = 'success';

            storeAndPushNotification($titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.appointments.show', $appointment));
        }
    }

    protected function newUnavailableCarNotification($order)
    {
        if ($order) {
            $titleAr = "طلب سيارة غير متوفرة";
            $titleEn = "Unavailable Car Request";
            $messageAr = "قام $order->name بطلب سيارة ($order->car_name) .من الموقع اضغط لرؤية تفاصيل الطلب والتواصل معه";
            $messageEn = "$order->name ordered a ($order->car_name) car from the site. Click to view the order details and contact him.";
            $icon = '<i class="fas fa-car-alt fs-1 text-warning"></i>';
            $color = 'warning';

            storeAndPushNotification($titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.orders.show', $order));
        }
    }

    protected function individualOrderNotification($order)
    {
        if ($order) {
            $titleAr = "طلب سيارة جديد";
            $titleEn = "Car Order of type " . $order->car->name_ar;
            $messageAr = "قام " . $order->name . " بطلب سيارة (" . $order->car->name_ar . ") .من الموقع اضغط لرؤية تفاصيل الطلب";
            $messageEn = $order->name ." ordered a (" . $order->car->name_en . ") car from the site. Click to view the order details and contact him.";
            $icon = '<i class="fas fa-car-alt fs-1 text-warning"></i>';
            $color = 'warning';

            storeAndPushNotification($titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.orders.show', $order));
        }
    }

    protected function corporateOrderNotification($order)
    {
        if ($order) {
            $titleAr = "طلب شركة ";
            $titleEn = "Corporate Order";
            $messageAr = "هناك طلب شركات من $order->organization_name اضغط لرؤية تفاصيل الطلب.";
            $messageEn = "There is a corporate order form $order->organization_name Click to view the order details.";
            $icon = '<i class="fas fa-car-alt fs-1 text-warning"></i>';
            $color = 'warning';

            storeAndPushNotification($titleAr, $titleEn, $messageAr, $messageEn, $icon, $color, route('dashboard.orders.show', $order));
        }
    }
}
