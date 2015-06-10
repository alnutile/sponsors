@if($user->subscribed())
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    @if($user->cancelled())
                        <h4>Expires:
                            {{
                                $user->subscription()->getSubscriptionEndDate()->toFormattedDateString()
                            }} ( {{ $user->subscription()->getSubscriptionEndDate()->diffInDays(\Carbon\Carbon::now())  }} days from now )
                        </h4>
                        <a href="/sponsor">Take a moment to re-subscribe?</a>
                    @else
                        <h4>Auto Renews:
                            {{
                                $user->subscription()->getSubscriptionEndDate()->toFormattedDateString()
                            }} ( {{ $user->subscription()->getSubscriptionEndDate()->diffInDays(\Carbon\Carbon::now())  }} days from now )
                        </h4>
                        <a href="/profile/cancel"><i class="glyphicon glyphicon-adjust"></i>&nbsp;Cancel</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif


