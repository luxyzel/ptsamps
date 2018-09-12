
@include('templates.header')

  <title>PO Request View Details | Asset Management and Procurement System</title>
</head>

<body>
    <div style="width: 1200px; margin: auto;">
        <p class="app-page-name" style="font-size: 30px; margin-top: 20px;">View Puchase Order Request</p>

            <!-- ALERT SUCCESS -->
            @if(Session::has('success'))
                <div class="comment-success" id ="comment-success" style="margin-top: 25px">
                    <strong> {{ Session::get('success') }}</strong> 
                </div>
            @endif

            <!-- ALERT ERROR -->
            @if(Session::has('error'))
                <div class="comment-error" id ="comment-error" style="margin-top: 25px">
                    <strong> {{ Session::get('success') }}</strong> 
                </div>
            @endif

            <!-- DISPLAY ERRORS -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <br><strong>{{ $error }}</strong>
                    @endforeach
                </ul>
            </div>
            @endif


            <form method="POST" action="{{ route('pending-po.update', $ids->group_id)}}">{{method_field('PUT')}} 
            {{csrf_field()}}

            <div class="manage-content">
                <table style="width: 100%; text-align: center;" >
                    <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>UOM</th>
                            <th>Description</th>
                            <th>Unit Price (₱)</th>
                            <th>Total Price (₱)</th>
                        </tr>
                    </thead>
                    @foreach ($procures as $procure)
                    <tr>
                      <td style="display:none;">
                      <input type="text" name="idlists[]" value="{{$procure->id}}"></td>
                      <td>{{$procure->item}}</td>
                      <td>{{$procure->quantity}}</td>
                      <td>{{$procure->uom}}</td>
                      <td>{{$procure->description}}</td>
                      <td>{{$procure->unit_price}}</td>
                      <td>{{$procure->total_price}}</td>
                    </tr> 
                    @endforeach
                </table>
            </div>
                
            <div class="manage-content" style="margin-top: 20px;">
                <div class="app-label" style="margin-top: 10px;">
                    <div class="fl">
                        <p class="app-page-name" style="font-size: 20px">Payment Information</p>
                    </div>
                    <div class="fl">
                        <p class="app-page-sub"></p>
                    </div>
                    <div class="clr"></div>  
                </div>
                
                <div class="proc-bot fl" style="padding-right: 20px;">
                    <span class="lbl-login">Notes/Remarks/Comment:</span>
                    <label class="lbl-po-approver">{{$payments->remarks}}</label>

                    <div style="width: 100%; height: 40px;"></div>
                    
                    <span class="lbl-login">Payment Terms:</span>
                    <label class="lbl-po-approver">{{$payments->payment_terms}}</label>

                    <input type="hidden" name="poid" id="poid" value="{{$payments->group_id}}">
                </div>

                <div class="proc-bot fl">

                    <div class="fl" style="width: 49%;">
                        <input type="hidden" name="paymentid" value="{{$payments->id}}">
                        <span class="lbl-login">VAT Inclusive:</span>
                        <label for="remarks" class="lbl-po-approver">{{$payments->vat_inc}}</label>

                        <div style="width: 100%; height: 15px;"></div>

                        <span class="lbl-login">VAT Exclusive:</span>
                        <label for="remarks" class="lbl-po-approver">{{$payments->vat_ex}}</label>

                        <div style="width: 100%; height: 15px;"></div>

                        <span class="lbl-login">Less Discount:</span>
                        <label for="remarks" class="lbl-po-approver">{{$payments->less_discount}}</label>

                        <div style="width: 100%; height: 15px;"></div>
                    </div>

                    <div class="fl" style="width: 49%;">
                        <span class="lbl-login">12% VAT</span>
                        <label for="remarks" class="lbl-po-approver">{{$payments->vat}}</label>

                        <div style="width: 100%; height: 30px;"></div>
                
                        <span class="lbl-login" style="font-weight: bold;">Total Price:</span>
                        <label for="remarks" class="lbl-po-approver ttl-po-price">{{$payments->total_price}}</label>
                    </div>
                    <div class="clr"></div>
                    
                </div>

                <div class="clr"></div>
            </div>

            <div class="manage-content" style="margin-top: 20px;">
                <p class="app-page-name" style="font-size: 20px; margin-top: 20px;">Purchased Order Decision</p>

                <span class="lbl-login">Comment:</span>
                <textarea name="comments" id="comments" rows="4" cols="30"></textarea>
                <button class="submit-approver-acc" value="approved" name="submit">Approve</button>
                <button class="submit-approver-acc" style="margin-top: 10px; background-color: #fd5f60;"  value="rejected" name="submit">Reject</button>
            </div>

            <a href="{{ route('pending-po.index') }}" class="po-back-page">Back To Previous Page</a>
        </form>
    </div>

@include('templates.footer')

<script type="text/javascript">


  /*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);

</script>