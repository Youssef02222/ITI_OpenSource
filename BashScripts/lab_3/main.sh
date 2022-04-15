#!/bin/bash
################# script for create operations on database select update delete
######## exit codes:    0 successfull
######################  1 file not exist
######################  2 database error

#####
USR="root"
DATABASE="lab1"
T1="Invoices"
T2="Invoices_details"

[ ! -f invoices ] && exit 1

source checker.sh


function insertRecords {
    checkDatabase
    checkTables
     < invoices awk -v USR=${USR} -v DATABASE=${DATABASE} -v T1=${T1} -f "insert" |mysql -u ${USR} -ppassword 
}

function deleteRecords {
 < invoices awk -v USR=${USR} -v DATABASE=${DATABASE} -v T1=${T1} -f "delete" |mysql -u ${USR} -ppassword
}

function displayRecords {
 < invoices awk -v USR=${USR} -v DATABASE=${DATABASE} -v T1=${T1} -f "select" |mysql -u ${USR} -ppassword
}


while (( 1 ))
do
	echo "1 Insert new invoice"
	echo "2 Delete existing invoice"
	echo "3 Display invoice"
	echo "0 for exit"
	read option

	case $option in
	"1")
		echo "Insert new invoice"
        echo ""
       insertRecords
        echo "Data from file invoice added successfully"
         echo ""
          echo ""
		;;
	"2")
		echo "Delete existing invoice"
        echo ""
       deleteRecords
        echo "Data Deleted successfully from table invoices"
         echo ""
          echo ""


		;;
	"3")
		echo "Display invoice"
        displayRecords
        echo ""

	
		;;
	"0")
		echo "Exiting the program. Bye bye"
		break
		;;
	*)
		echo "Invalid option. "
        echo ""
		;;
	esac

done

exit 0