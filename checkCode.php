<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require('dbconnect.php');
    $code = $_POST['code'];
    $sql = "SELECT discount from codes where code='{" . $code . "}'";
    $statement = $db->prepare($sql);
    $statement->execute();

    if ($statement->rowCount() != 0) {
        $returnString = "";
        switch ($statement->fetch()[0]) {
            case 10:
                $returnString .= "0.90**4.50**<form action=\"https://test.bitpay.com/checkout\" method=\"post\">
                                      <input type=\"hidden\" name=\"action\" value=\"checkout\" />
                                      <input type=\"hidden\" name=\"posData\" value=\"\" />
                                      <input type=\"hidden\" name=\"data\" value=\"X5rjfTDJKeUslPBtyOQISoooC2CRlmUGqeC2/TYyJdzGasvvGO8ZicDTwAp4OvmW/oouxwFdMqsPdCaWuWIKNf1/nZv3ofm7kDglKNSOP2E=\" />
                                      <input type=\"image\" src=\"https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg\" name=\"submit\" style=\"width: 210px\" alt=\"BitPay, the easy way to pay with bitcoins.\">
                                  </form>**<form action=\"https://test.bitpay.com/checkout\" method=\"post\">
                                      <input type=\"hidden\" name=\"action\" value=\"checkout\" />
                                      <input type=\"hidden\" name=\"posData\" value=\"\" />
                                      <input type=\"hidden\" name=\"data\" value=\"X5rjfTDJKeUslPBtyOQISoooC2CRlmUGqeC2/TYyJdyNRQUeRKhQF2k4UJ4azMSK64ufPSJTQ0or7tFUMkPJSiNuA4UoWgQaWfoNEeoCWVg=\" />
                                      <input type=\"image\" src=\"https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg\" name=\"submit\" style=\"width: 210px\" alt=\"BitPay, the easy way to pay with bitcoins.\">
                                  </form>";
                break;
            case 20:
                $returnString .= "0.80**4.00**<form action=\"https://test.bitpay.com/checkout\" method=\"post\">
                                      <input type=\"hidden\" name=\"action\" value=\"checkout\" />
                                      <input type=\"hidden\" name=\"posData\" value=\"\" />
                                      <input type=\"hidden\" name=\"data\" value=\"X5rjfTDJKeUslPBtyOQISoooC2CRlmUGqeC2/TYyJdyNRQUeRKhQF2k4UJ4azMSK64ufPSJTQ0or7tFUMkPJSiNuA4UoWgQaWfoNEeoCWVg=\" />
                                      <input type=\"image\" src=\"https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg\" name=\"submit\" style=\"width: 210px\" alt=\"BitPay, the easy way to pay with bitcoins.\">
                                    </form>**<form action=\"https://test.bitpay.com/checkout\" method=\"post\">
                                      <input type=\"hidden\" name=\"action\" value=\"checkout\" />
                                      <input type=\"hidden\" name=\"posData\" value=\"\" />
                                      <input type=\"hidden\" name=\"data\" value=\"X5rjfTDJKeUslPBtyOQISoooC2CRlmUGqeC2/TYyJdyNRQUeRKhQF2k4UJ4azMSKt2C//BVV/2mNrUaWPGNpi+S8JbdmelY6QgMcilWNJrM=\" />
                                      <input type=\"image\" src=\"https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg\" name=\"submit\" style=\"width: 210px\" alt=\"BitPay, the easy way to pay with bitcoins.\">
                                    </form>";
                break;
            case 50:
                $returnString .= "0.50**2.50**<form action=\"https://test.bitpay.com/checkout\" method=\"post\">
                                      <input type=\"hidden\" name=\"action\" value=\"checkout\" />
                                      <input type=\"hidden\" name=\"posData\" value=\"\" />
                                      <input type=\"hidden\" name=\"data\" value=\"X5rjfTDJKeUslPBtyOQISoooC2CRlmUGqeC2/TYyJdyNRQUeRKhQF2k4UJ4azMSKt2C//BVV/2mNrUaWPGNpi+S8JbdmelY6QgMcilWNJrM=\" />
                                      <input type=\"image\" src=\"https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg\" name=\"submit\" style=\"width: 210px\" alt=\"BitPay, the easy way to pay with bitcoins.\">
                                    </form>**<form action=\"https://test.bitpay.com/checkout\" method=\"post\">
                                      <input type=\"hidden\" name=\"action\" value=\"checkout\" />
                                      <input type=\"hidden\" name=\"posData\" value=\"\" />
                                      <input type=\"hidden\" name=\"data\" value=\"X5rjfTDJKeUslPBtyOQISoooC2CRlmUGqeC2/TYyJdyO3YpbxvbVU0H24f0OS9SCnCYDtgTpAI9hhN8MceUA5FyoJygT/1/GI4fhI3bqn/4=\" />
                                      <input type=\"image\" src=\"https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg\" name=\"submit\" style=\"width: 210px\" alt=\"BitPay, the easy way to pay with bitcoins.\">
                                    </form>";
                break;
        }
        echo $returnString;
    } else {
        echo "invalid";
    }
}
