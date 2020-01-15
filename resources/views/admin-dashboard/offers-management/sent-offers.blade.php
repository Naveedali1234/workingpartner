@extends('admin-dashboard.layouts.master')
@section('content')
<div class="row">
            <div class="col-lg-12">
              <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
              <div class="card">
                <div class="card-header">
                  <h4>Sent Offers</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="myTable">
                      <thead>
                        <tr>
                          <th>Unique ID</th>
                          <th>Business Title</th>
                          <th>Sender Name</th>
                          <th>Reciever Name</th>
                          <th>Amount</th>
                          <th>Shares Percent</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($offers as $offer)
                        <tr>
                          <td>{{$offer->id}}</td>
                          <td>{{$offer->business_title}}</td>
                          <td>{{$offer->sender->name}}</td>
                          <td>{{$offer->reciever->name}}</td>
                          <td>{{$offer->amount}}</td>
                          <td>R {{$offer->percent_share}}</td>
                          <td>{{$offer->status =='1'? 'Offer Accepted': 'Not Accepted Yet'}}</td>
                          <td>
                            <button class="btn btn-info offer-details" value="{{$offer->id}}" title="Open Offer" href="">Offer Details</button>
                            <button class="btn btn-danger" title="Delete Offer" href="">Delete Offer</button>
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
<!-- Modal -->
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
            <label class="">Sender Name</label>
            <div class="">
              <input id="sender_name" type="text" disabled class="form-control"><small class="form-text">Owner Name</small>
            </div>
          </div>
          <div class="form-group">
            <label class="">Reciever Name</label>
            <div class="">
              <input id="reciever_name" type="text" disabled class="form-control"><small class="form-text">Owner Name</small>
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
                $('#sender_name').val(data.sender.name);
                $('#reciever_name').val(data.reciever.name);
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