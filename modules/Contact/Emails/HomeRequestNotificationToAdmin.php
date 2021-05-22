<?php
/**
 * Created by PhpStorm.
 * User: dunglinh
 * Date: 6/4/19
 * Time: 20:49
 */

namespace Modules\Contact\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Contact\Models\HomeRequest;

class HomeRequestNotificationToAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;

    public function __construct(HomeRequest $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {

        return $this->subject(__('[:site_name] New message',['site_name'=>setting_item('site_title')]))->view('Contact::emails.home-notification')->with([
            'contact' => $this->contact,
        ]);
    }
}
