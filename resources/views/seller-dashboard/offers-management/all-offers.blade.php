@extends('seller-dashboard.layouts.master')
@section('content')
<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>{{$offer_type}}</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          
                          <th>Business Title</th>
                          <th>{{$offer_type == 'Sent Offers' ? 'Reciever Name' : 'Sender Name'}}</th>
                          <th>Amount</th>
                          <th>Shares Percent</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($offers as $offer)
                        <tr>
                          <td>{{$offer->business_title}}</td>
                          <td>{{$offer_type == 'Sent Offers'? $offer->reciever->name : $offer->sender->name}}</td>
                          <td>{{$offer->amount}}</td>
                          <td>{{$offer->percent_share}}</td>
                          <td>{{$offer->status =='1'? 'Offer Accepted': 'Not Accepted Yet'}}</td>
                          <td>
                            <button class="btn btn-info offer-details" value="{{$offer->id}}" title="Open Offer" href="">Offer Details</button>
                            @if($offer_type=='Recieved Offers')
                            @if($offer->status==1)
                            <p>Offer Accepted and Paid</p>
                            @else
                            <form target="_blank" action="https://sandbox.payfast.co.za/eng/process" method="POST">

                              <input type="hidden" name="merchant_id" value="10015150">
                              <input type="hidden" name="merchant_key" value="aaid6ctdo8lxz">
                              <input type="hidden" name="custom_str1" value="{{$offer->id}}">

                              <input type="hidden" name="amount" value="{{$offer->amount}}">
                              <input type="hidden" name="name_first" value="{{$offer_type == 'Sent Offers'? $offer->reciever->name : $offer->sender->name}}">
                              <!-- <input type="hidden" name="name_last" value=""> -->
                              <input type="hidden" name="email_address" value="{{$offer_type == 'Sent Offers'? $offer->reciever->email : $offer->sender->email}}">
                              <input type="hidden" name="cell_number" value="0823456789">

                              <input type="hidden" name="item_name" value="Accept offer from Seller">
                              <input type="hidden" name="return_url" value="http://6381b99c.ngrok.io/seller/return">
                              <input type="hidden" name="cancel_url" value="http://6381b99c.ngrok.io/seller/cancel">
                              <input type="hidden" name="notify_url" value="http://6381b99c.ngrok.io/seller/notify">
                              <button type="submit" title="You will have to pay to accept the offer" class="btn btn-primary">Accept offer</button>
                            </form>
                            @endif
                            @endif
                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
<div id="offerss" tabindex="-1" role="dialog" aria-labelledby="offer_details" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Offer Details</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <!-- <form> -->
          <div class="form-group">
            <label class="">Business Title</label>
            <div class="">
              <input id="business_title" disabled type="text" class="form-control"><small class="form-text">Business Title</small>
            </div>
            <div class="form-group">
              <label>Description</label>
              <div>
                <textarea id="description" disabled class="form-control"></textarea><small class="form-text">Description</small>
              </div>
            </div>
          <div class="form-group">
            <label class="">Amount</label>
            <div class="">
              <input id="amount" type="text" disabled class="form-control"><small class="form-text">Amount</small>
            </div>
          </div>
           <div class="form-group">
            <label class="">Working Partner Name</label>
            <div class="">
              <input id="working_partner" type="text" disabled class="form-control"><small class="form-text">Working Partner Name</small>
            </div>
          </div>
           <div class="form-group">
            <label class="">Percent Share (%)</label>
            <div class="">
              <input id="percent_share" disabled type="text" class="form-control"><small class="form-text">Percent Share</small>
            </div>
          </div>
          <div class="form-group">
            <label class="">Status</label>
            <div class="">
              <input id="status" type="text" disabled class="form-control"><small class="form-text">Status</small>
            </div>
          </div>            
        <!-- </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('additional-js')
<script type="text/javascript">
  $(document).ready(function(){
    $('.offer-details').on('click',function(){
      console.log('hello');
            var offer = $(this).val();
            $.ajax({
              type: 'GET',
              url:'{{url("offer-details")}}'+'/'+offer ,
              dataType: 'json',
              success: function(data){
                console.log(data);
                $('#business_title').val(data.business_title);
                $('#amount').val(data.amount);
                $('#description').val(data.description);
                $('#working_partner').val(data.reciever.name);
                $('#percent_share').val(data.percent_share);
                if(data.status==1){
                  $('#status').val('Offer Accepted');
                }
                else{
                  $('#status').val('Not Accpeted yet');
                }
                $('#offerss').modal('show');
              }  
            });
            });
  }); 
</script>
@endsection