<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xendit\Xendit;
use App\Models\User;
use App\Models\TransactionUser;
use App\Models\PackageSubscription;
use Auth;

class XenditController extends Controller
{
    //

    public function generateInvoice($data)
    {
        Xendit::setApiKey(env('API_XENDIT_DEV'));

        $params = [
            'external_id' => $data->kode_pembayaran,
            'amount' => $data->amount,
            'description' => $data->judul_buku,
            'invoice_duration' => 86400,
            'customer' => [
                'given_names' => $data->name,
                'surname' => $data->name,
                'email' => $data->email,
            ],
            'customer_notification_preference' => [
                'invoice_created' => ['whatsapp', 'sms', 'email'],
                'invoice_reminder' => ['whatsapp', 'sms', 'email'],
                'invoice_paid' => ['whatsapp', 'sms', 'email'],
                'invoice_expired' => ['whatsapp', 'sms', 'email'],
            ],
            'success_redirect_url' => 'https://publish-palace.com/purchase-book-completed',
            'failure_redirect_url' => 'https://www.google.com',
            'currency' => 'IDR',
            'items' => [
                [
                    'name' => $data->judul_buku,
                    'quantity' => 1,
                    'price' => $data->amount,
                ],
            ],
        ];

        $createInvoice = \Xendit\Invoice::create($params);

        return $createInvoice;
    }
}