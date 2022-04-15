checkDatabase() {
        RESULT=`mysql -u root -ppassword --skip-column-names -e "show databases like 'lab1'"`
        if [ $RESULT == 'lab1' ]; then
                echo "Database exists"
        else
                echo "Database doesn't exist"
        fi
}


checkTables() {
        TABLE1=`mysql -u root -ppassword --skip-column-names -e "use lab1; show tables like 'Invoices'"`
        TABLE2=`mysql -u root -ppassword --skip-column-names -e "use lab1; show tables like 'invoice_data'"`

        if [ $TABLE1 == 'Invoices' ] && [ $TABLE2 == 'invoice_data' ]; then
                echo "Tables exist"
        else
                echo "Tables don't exist"
        fi
}

checkInvoice() {
        RESULT=`mysql -u root -ppassword --skip-column-names -e "select * from lab1.Invoices where inv_id = $1"`
        if [ -z "$RESULT" ]; then
                echo "Not found"
        else
                echo $RESULT
        fi
}
checkInvoice ${1}