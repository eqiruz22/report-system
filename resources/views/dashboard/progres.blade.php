<table class="table table-bordered">
    <thead>
        <tr>
          <th scope="col">RPO</th>
          <th scope="col">DELIVER BARANG</th>
          <th scope="col">BAST</th>
          <th scope="col">REMARKS</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $item)
          <tr>
              <td>{{ $item->rpo }}</td>
              <td>{{ $item->deliver_barang }}</td>
              <td>{{ $item->bast }}</td>
              <td>{{ $item->remarks }}</td>
          </tr>
          @endforeach
      </tbody>    
</table>