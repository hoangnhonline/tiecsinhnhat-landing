<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mail</title>
</head>
<body>
<table align="center" border="1" cellpadding="15" cellspacing="0" width="600px" bgcolor="#dcf0f8" style="margin:0;padding:0;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#444;line-height:18px">
  <tbody>
      <tr>
        <th colspan="2">THÔNG TIN ĐẶT MÓN</th>
      </tr>     
      
      <tr>
        <td width="200px" class="tieu-de">Điện thoại</td>
        <td class="gia-tri">{{ $phone }}</td>
      </tr>
      <tr>
        <td width="200px" class="tieu-de">Số bàn</td>
        <td class="gia-tri">{{ $table_no }}</td>
      </tr> 
      <tr>
        <td width="200px" class="tieu-de">Món</td>
        <td class="gia-tri">
          <?php 
            $food_id_list = rtrim($food_id_list, ',');
            $foodIdArr = explode(',', $food_id_list);
            $foodList = \DB::table('food')->whereIn('id', $foodIdArr)->get();
            $i = 0;
          ?>
          <ul>

            @foreach($foodList as $food)
            <?php $i++; ?>
            <li style="list-style: none;">{{ $i }}. {{ $food->name }}</li>
            @endforeach
          </ul>
        </td>
      </tr>     
     
  </tbody>
</table>
<style type="text/css">
  td.tieu-de{
    background-color: #CCC
  }
  td.gia-tri{
    font-size:17px;
    font-weight: bold;
  }
</style>
</body>
</html>