<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mpociot\Teamwork\TeamInvite;

class TeamInvitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \Mpociot\Teamwork\TeamInvite
     */
    public TeamInvite $invite;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TeamInvite $invite)
    {
        $this->invite = $invite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.team.invitation', ['team' => $this->invite->team, 'invite' => $this->invite]);
    }
}
