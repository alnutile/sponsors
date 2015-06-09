<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                Past Payments
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

                <pre>
                    <?php var_dump($onetime_purchase); ?>
                </pre>
            </div>
        </div>
    </div>
</div>