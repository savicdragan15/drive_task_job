<?php 

dump($subscriber->avatar);
?>
<?php foreach ($subscriber->avatar as $avatar){?>
    <img src="{!! $avatar->avatar_name !!}" width="80" alt="avatar" />
<?php } ?>
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
          <th>Issue</th>
        </tr>
      </thead>
      <tbody>
           <tr>
                <td>{!! $subscriber->id !!}</td>
                <td>{!! $subscriber->subscriber_name !!}</td>
                <td>{!! $subscriber->subscriber_surname !!}</td>
                <td>{!! $subscriber->birthday->format('d/m/Y') !!}</td>
                <td>{!! $subscriber->gender !!}</td>
                <td>{!! $subscriber->city !!}</td>
                <td>{!! $subscriber->postalcode !!}</td>
                <td>{!! $subscriber->issue !!}</td>
          </tr>
      </tbody>
    </table>
</div>