<div class="modal-dialog modal-md" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <center><strong>Report Details</strong></center>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      
    </div>
    <div class="modal-body">
      <p style="color:black; font-size: 16px; font-weight: bold;">

      <?php
        foreach ($company_info as $company) {
         echo $company['company_name'];
        }

        echo '<br>';
        echo "Daily Report: ";foreach ($marks as $row) { }
        $ab=$row['transection_category'];
        if($ab==2){
          echo "Customer";
        }elseif ($ab==1) {
          echo "supplier";
        }elseif ($ab==4) {
         echo "Loan";
        }else{
          echo "Office";
        }
        echo "<br>";
        echo "Date:";  echo $date=date('d-m-Y'); 
      ?>
      </p>
      
      <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center">Account</th>
            <th class="text-center">Description</th>
            <th class="text-center">Receipt Amount</th>
            <th class="text-center">Paid Amount</th>
          </tr>
        </thead>
        <?php if ($marks) { ?>
        <?php foreach ($marks as $row){?>
        <tbody>
          <tr>
            <td  align="center">     
              <?php 
              echo $row['person_name'];
              echo $row['customer_name']; 
              echo $row['supplier_name'];
              if($row['person_name']==''AND $row['customer_name']==''AND $row['supplier_name']==''){
                echo $row['relation_id'];
              }
              ?>
              </td>

              <td>
                <?php
                  $debt=$row['description'];
                  echo $debt 
                ?>
              </td>

              <td style="text-align: right;"><?php
                $debt=$row['amount'];
                $dolar="$";
                if($debt==0){
                  echo "";
                }else{
                  echo (($position==0)?"$currency ".number_format($debt, 2, '.', ','):number_format($debt, 2, '.', ',')." $currency");
                } ?>
              </td>

              <td align="right">
              <?php   
                $credit=$row['pay_amount']; 
                if($credit==0){
                  echo "";
                }else{
                  echo (($position==0)?"$currency ".number_format($credit, 2, '.', ','):number_format($credit, 2, '.', ',')." $currency");
                } 
              ?>
              </td>

            </tbody>
            <?php } ?>
            <?php
              }
            ?>
        <tfoot>
                  
        </tfoot>
      </table>
    </div>
  </div>
</div>