@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>List of all subscribers</h2>

                    <div class="table-responsive">          
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Lastname</th>
                                    <th>Birthday</th>
                                    <th>Gender</th>
                                    <th>City</th>
                                    <th>Postal code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @if($subscribers->total() == 0)
                                    <tr><td colspan="8">No results found.</td></tr>
                                @endif
                                
                                @foreach ($subscribers->getCollection() as $subscriber)
                                <tr>
                                    <td>{!! $subscriber->id !!}</td>
                                    <td>{!! $subscriber->subscriber_name !!}</td>
                                    <td>{!! $subscriber->subscriber_surname !!}</td>
                                    <td>{!! $subscriber->birthday->format('d/m/Y') !!}</td>
                                    <td>{!! $subscriber->gender !!}</td>
                                    <td>{!! $subscriber->city !!}</td>
                                    <td>{!! $subscriber->postalcode !!}</td>
                                    <td><button class="btn btn-success view-more" data-id='<?= $subscriber->id ?>'><i title="View more" class="fa fa-search" aria-hidden="true"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="pagination"> {{ $subscribers->links() }} </div>

            </div>
        </div>
    </div>
    
    
<script>
      $(document).ready(function(){
          
          $('.view-more').click(function(){
              
              var id = $(this).attr('data-id');
              
              $.pgwModal({
                url: '<?= url('/subscriber') ?>/'+id,
                maxWidth : 1200,
                titleBar : true,
                title : 'Details of subscriber',
                ajaxOptions : {
                    success : function(data) {
                        if (data) {
                            $.pgwModal({ pushContent: data });
                        } else {
                            $.pgwModal({ pushContent: 'Doslo je do greske!' });
                        }
                    }
                }
            });
            
          });
          
      });
</script>
  
</div>
@endsection
