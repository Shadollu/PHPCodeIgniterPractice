<?php

Class Pay2goinvoice_model extends CI_Model
{

    private $ResponseType;
    private $Version;
    private $TimeStamp;
    private $MerchantOrderNo;
    private $Status;
    private $CreateStatusTime;
    private $Category;
    private $BuyerName;
    private $BuyerUBN;
    private $BuyerAddress;
    private $BuyerEmail;
    private $CarrierType;
    private $CarrierNum;
    private $LoveCode;
    private $PrintFlag;
    private $TaxType;
    private $TaxRate;
    private $CustomerClearance;
    private $Amt;
    private $AmtSales;
    private $AmtZero;
    private $AmtFree;
    private $TaxAmt;
    private $TotalAmt;
    private $ItemName;
    private $ItemCount;
    private $ItemUnit;
    private $ItemPrice;
    private $ItemAmt;
    private $ItemTaxType;
    private $Comment;

    function __construct()
    {
        parent::__construct();
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
