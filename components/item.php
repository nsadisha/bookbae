<?php include "./php/db.php" ?>
<?php include "./php/helper.php" ?>

<!-- Cart item -->
<style>
    .cart-item .cart-item-name{
        color: black;
        text-decoration: none;
    }
    .cart-item .cart-item-name:hover{
        color: #87574b;
    }
  input[type="number"] {
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
    appearance: textfield;
    background-color: transparent;
  }
  
  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
  }
  
  .cart-item .number-input {
    display: block;
    width: 6rem;
  }
  
  .cart-item .number-input button {
    outline:none;
    -webkit-appearance: none;
    background-color: transparent;
    border: none;
    align-items: center;
    justify-content: center;
    width: 1.5rem;
    height: 1.5rem;
    cursor: pointer;
    margin: 0;
    position: relative;
    font-size: 1.1rem;
  }
  
  .number-input input[type=number] {
    max-width: 2rem;
    padding: .5rem;
    border: solid #ddd;
    border-width: 0 1px;
    height: 1.5rem;
    text-align: center;
  }

  .cart-item .close-btn{
      font-size: 2rem;
  }
</style>

<?php

function cartItem(){
    $item = "
        <tr class='align-middle cart-item'>
            <td class='w-50' style='min-width: 15rem;'>
                <div class='d-flex'>
                    <div class=''>
                        <img src='assets/images/view page/1.jpg' alt='image' style='max-width: 4rem;'>
                    </div>
                    <div class='d-grid align-items-center ms-3'>
                        <div>
                            <a href='view.php?isbn=1231231213212' class='cart-item-name'><strong class='mb-0'>Xiaomi 365</strong><br></a>
                            <span><small>By: someone</small></span>
                        </div>
                    </div>
                </div>
            </td>
            <td style='min-width: 5rem;'><strong>Rs 500.00</strong></td>
            <td style='min-width: 6rem;'>
                <div class='number-input mx-auto'>
                    <form action="."php/editCart.php"." method='get'>
                        <input type='hidden' name='isbn' value='1231233214'>
                        <button type='submit' name='submit' value='update' onclick='this.parentNode.querySelector(\"input[type=number]\").stepDown()'>-</button>
                        <input class='quantity' min='1' name='quantity' value='1' type='number'>
                        <button type='submit' name='submit' value='update' onclick='this.parentNode.querySelector(\"input[type=number]\").stepUp()'>+</button>
                    </form>
                </div>
            </td>
            <td style='min-width: 8rem;'><strong>RS. 1000.00</strong></td>
            <td style='width: 3%;'>
            <form action="."php/editCart.php"." method='get'>
                    <input type='hidden' name='isbn' value='1231233214'>
                <button type='submit' name='submit' value='remove' class='btn close-btn p-2'>&times;</button>
            </form>
            </td>
        </tr>
    ";

    echo $item;
}

?>

<!-- Order item -->
<style>

</style>

<?php

function orderItem($orderID, $date, $itemCount, $price, $note, $status){
    $price = number_format($price, 2);
    $statusClass = getStatus($status);
    $item = "
        <tr class='order-item'>
            <td><a href='viewOrder.php?id=$orderID'><strong>#$orderID</strong></a></td>
            <td><strong>$date</strong></td>
            <td><strong>$itemCount</strong></td>
            <td><strong>RS. $price</strong></td>
            <td><button class='btn' data-bs-toggle='modal' data-bs-target='#$orderID'><i class='bi bi-stickies'></i></button></td>
            <td><span class='badge $statusClass'><strong>$status</strong></span></td>
        </tr>

        <!-- Modal -->
        <div class='modal fade' id='$orderID' tabindex='-1' aria-labelledby='".$orderID."Label' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='".$orderID."Label'>#$orderID Notes</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    $note
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn bg-brown text-white' data-bs-dismiss='modal'><strong>Close</strong></button>
                </div>
                </div>
            </div>
        </div>
    ";

    echo $item;
}

function getStatus($status){
    switch ($status) {
        case 'Delivered':
            return "bg-success";
            break;
        case 'Shipped':
            return "bg-warning";
            break;
        case 'Processing':
            return "bg-info";
            break;
        case 'Cancelled':
            return "bg-danger";
            break;
        
        default:
            return "";
            break;
    }
}

?>