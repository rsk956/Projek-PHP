<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Metode Bisection (Newton's Secant Method)</title>
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid p-3">
      <div class="row">
        <h2 class="card-title text-center">Metode Bisection (Newton's Secant Method)</h2>
        <div class="solusi">
          <p class="lead text-center">
          Carilah akar persamaan <strong>f(x) = x<sup>3</sup>-x-6</strong></p>
          <?php
          //----Fungsi menentukan persamaan
          function persamaan($x)
          {
          return pow($x,3)-$x-6;
          }
          //----End fungsi persamaan
          $a =isset($_GET['a'])?$_GET['a']*1:0;
          $b =isset($_GET['b'])?$_GET['b']*1:0;
          $n =isset($_GET['n'])?$_GET['n']*1:0;
          ?>
          <form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>" class="p-3 shadow-sm rounded">
            <div class="row mb-3">
              <label for="a" class="col-sm-2 col-form-label">Masukkan nilai a</label>
              <div class="col-sm-10">
                <input type="text" class="form-control w-25" name="a" id="a" value="<?php echo $a;?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="b" class="col-sm-2 col-form-label">Masukkan nilai b</label>
              <div class="col-sm-10">
                <input type="text" class="form-control w-25" name="b" id="b" value="<?php echo $b;?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="n" class="col-sm-2 col-form-label">Jumlah Iterasi</label>
              <div class="col-sm-10">
                <input class="form-control w-25" type="text" name="n" id="n" value="<?php echo $n;?>" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary w-25" name="button" id="button">Proses</button>
              </div>
            </div>
          </form>
          <?php
          $data_r="";
          if($n>0)
          {
          $fa=persamaan($a);
          $fb=persamaan($b);
          if($fa*$fb>=0)
          {
          echo " f(a)xf(b)>=0, proses dihentikan karena tidak ada akar !";
          }
          else
          {
          ?>
          <table class="table table-warning table-borderless align-middle text-center rounded shadow-sm ">
            <thead>
              <tr bgcolor="#e8e8e8">
                <th>Iterasi</th>
                <th>a</th>
                <th>f(a)</th>
                <th>b</th>
                <th>f(b)</th>
                <th>c</th>
                <th>f(c)</th>
              </tr>
            </thead>
            <tbody>
              <?php
              for($k=1;$k<=$n;$k++)
              {
              $x=($a+$b)/2;
              $fx=persamaan($x);
              ?>
              <tr>
                <td><?= $k;?></td>
                <td><?= number_format($a,4,",",".");?></td>
                <td><?= number_format($fa,4,",",".");?></td>
                <td><?= number_format($b,4,",",".");?></td>
                <td><?= number_format($fb,4,",",".");?></td>
                <td><?= number_format($x,4,",",".");?></td>
                <td><?= number_format($fx,4,",",".");?></td>
              </tr>
            </tbody>
            <?php
            if($fx<0)
            {
            $a=$x;
            $fb=$fx;
            }
            else
            {
            $b=$x;
            $fa=$fx;
            }
            }
            ?>
          </table>
          <?php
          }
          }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>