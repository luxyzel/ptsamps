<style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style>
<div class="container">
		
			<div class="dboard-content-menu">
                <p><strong>VENDOR</strong></p>
                  <div class="fl">
                      <br><strong><span>Company Name: </span></strong>
                      <label for="remarks" class="label">{{$vendor->company_name}}</label>
                    <br>
                    <div class="field">
                      <br><strong><span>Contact Person:</span></strong>
                      <label for="remarks" class="label">{{$vendor->contact_person}}</label>
                    </div>
                  </div>
                  <div class="fr">
                      <div class="field">
                      <br><strong><span>Designation: </span></strong>
                      <label for="remarks" class="label">{{$vendor->designation}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Email Address: </span></strong>
                      <label for="remarks" class="label">{{$vendor->email_address}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Contact Number: </span></strong>
                      <label for="remarks" class="label">{{$vendor->contact_number}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Company Address: </span></strong>
                      <label for="remarks" class="label">{{$vendor->company_address}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Phone: </span></strong>
                      <label for="remarks" class="label">{{$vendor->phone}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Fax: </span></strong>
                      <label for="remarks" class="label">{{$vendor->fax}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>VAT Reg. TIN: </span></strong>
                      <label for="remarks" class="label">{{$vendor->vat_number}}</label>
                    </div><br>
                </div>
              </div>

              <div class="dboard-content-menu">
                <p><strong>SHIP TO</strong></p>
                  <div class="fl">
                      <br><strong><span>Company Name: </span></strong>
                      <label for="remarks" class="label">{{$requestor->company_name}}</label>
                    <br>
                    <div class="field">
                      <br><strong><span>Contact Person: </span></strong>
                      <label for="remarks" class="label">{{$requestor->contact_person}}</label>
                    </div>
                  </div>
                  <div class="fr">
                      <div class="field">
                      <br><strong><span>Designation: </span></strong>
                      <label for="remarks" class="label">{{$requestor->designation}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Email Address: </span></strong>
                      <label for="remarks" class="label">{{$requestor->email_address}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Contact Number: </span></strong>
                      <label for="remarks" class="label">{{$requestor->contact_number}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Company Address: </span></strong>
                      <label for="remarks" class="label">{{$requestor->company_address}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Phone: </span></strong>
                      <label for="remarks" class="label">{{$requestor->phone}}</label>
                    </div><br>
                </div>
              </div>

		    
			<div class="manage-content">
                <table style="width: 100%; text-align: center;" >
                  <thead>
                    <tr>
                        <th style="display:none;">ID</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>UOM</th>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                  </thead>
                  @foreach ($procures as $key => $procure)
                    <tr>
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

			<div class="dboard-content-menu">
                <p><strong>PAYMENTS</strong></p><br>
                  <div class="fl">
                      <br><strong><span>Notes/Remarks/Comment: </span></strong>
                      <label for="remarks" class="label">{{$payments->remarks}}</label>
                    <br>
                    <div class="field">
                      <br><strong><span>Payment Terms: </span></strong>
                      <label for="remarks" class="label">{{$payments->payment_terms}}</label>
                    </div>
                  </div>
                  <div class="fr">
                      <div class="field">
                      <br><strong><span>VAT Inclusive: </span></strong>
                      <label for="remarks" class="label">{{$payments->vat_inc}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>VAT Exclusive: </span></strong>
                      <label for="remarks" class="label">{{$payments->vat_ex}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Less Discount: </span></strong>
                      <label for="remarks" class="label">{{$payments->less_discount}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>12% VAT: </span></strong>
                      <label for="remarks" class="label">{{$payments->vat}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Total Price: </span></strong>
                      <label for="remarks" class="label">{{$payments->total_price}}</label>
                    </div>
                </div>
              </div>

				<br><br>
               <table style="width: 100%; text-align: center;" >
                  <thead>
                    <tr>
                        <th>Requested by</th>
                        <th>Prepared by</th>
                        <th>Approved by</th>
                    </tr>
                  </thead>
                    <tr>
                      <td><strong>{{$requestor->requestor_name}}</strong>
                      	<br>{{$requestor->designation}}
                      </td>
                      <td><strong>Ann</strong>
                      	<br>IT Procurement and Asset Officer
                      </td>
                      <td><strong>Alvin Terrence Hong </strong>
                      	<br>CEO
                      </td>
                    </tr> 
                </table>

</div>