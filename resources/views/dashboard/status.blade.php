<table class="table table-bordered">
    <thead>
        <tr>
          <th scope="col">USER</th>
          <th scope="col">STATUS</th>
          <th scope="col">PRJ</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $item)
          <tr>
              <td>{{ $item->user_id }}</td>
              <td>{{ $item->report_id }}</td>
              <td>{{ $item->status_id }}</td>
          </tr>
          @endforeach
      </tbody>    
</table>