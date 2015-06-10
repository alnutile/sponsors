<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                Past Subscription Payments
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Invoice</th>
                    </tr>
                    </thead>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->dateString() }}</td>
                            <td>{{ $invoice->dollars() }}</td>
                            <td>
                                <a href="/profile/invoice/{{ $invoice->id }}">Download</a></td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                Past Charges (non subscription)
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    @foreach($onetime_purchase as $item)
                        <tr>
                            <td>{{ $item['created'] }}</td>
                            <td>{{ $item['amount'] }}</td>
                            <td>{{ $item['status'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>