<table class="table table-bordered">
    <thead>
        <tr>
          <th scope="col">NAME</th>
          <th scope="col">PRJ</th>
          <th scope="col">PROJECT TITLE</th>
          <th scope="col">PO</th>
          <th scope="col">COSTUMER</th>
          <th scope="col">PROJECT TYPE</th>
          <th scope="col">DATE OF PO</th>
          <th scope="col">DUE DATE</th>
          <th scope="col">PROJECT VALUE</th>
          <th scope="col">REMAINING REIMBUSMENT FEE</th>
          <th scope="col">GROSS MARGIN</th>
          <th scope="col">NET MARGIN</th>
          <th scope="col">IRR</th>
          <th scope="col">EQUIPMENT</th>
          <th scope="col">PMO COST</th>
          <th scope="col">OPEX</th>
          <th scope="col">UPDATED AT</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($list as $item)
          <tr>
              <td>{{ $item->user['name'] }}</td>
              <td>{{ $item->prj }}</td>
              <td>{{ $item->project_title }}</td>
              <td>{{ $item->po_number }}</td>
              <td>{{ $item->costumer }}</td>
              <td>{{ $item->project_type }}</td>
              <td>{{ $item->date_of_po }}</td>
              <td>{{ $item->due_date }}</td>
              <td>Rp {{ currency_IDR($item->project_value) }}</td>
              <td>Rp {{ currency_IDR($item->remaining_reimbusment_fee) }}</td>
              <td>{{ $item->gross_margin }}</td>
              <td>{{ $item->net_margin }}</td>
              <td>{{ $item->irr }}</td>
              <td>Rp {{ currency_IDR($item->equipment) }}</td>
              <td>Rp {{ currency_IDR($item->pmo_cost) }}</td>
              <td>Rp {{ currency_IDR($item->opex) }}</td>
              <td>{{ $item->updated_at }}</td>
          </tr>
          @endforeach
      </tbody>    
</table>