<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : "main";
switch ($page) {
    case 'dashboard':
        include "index.php";
        break;

    case 'department':
        include "master/department/index.php";
        break;
    case 'page-edit-department':
        include "master/department/edit-dept.php";
        break;
    case 'add-department':
        include "master/department/process-add-dept.php";
        break;
    case 'edit-department':
        include "master/department/process-edit-dept.php";
        break;
    case 'delete-department':
        include "master/department/process-delete-dept.php";
        break;

    case 'category-item':
        include "master/category-item/index.php";
        break;
    case 'page-edit-category-item':
        include "master/category-item/edit-category-item.php";
        break;
    case 'add-category-item':
        include "master/category-item/process-add-category-item.php";
        break;
    case 'edit-category-item':
        include "master/category-item/process-edit-category-item.php";
        break;
    case 'delete-category-item':
        include "master/category-item/process-delete-category-item.php";
        break;

    case 'category-cost':
        include "master/category-cost/index.php";
        break;
    case 'page-edit-category-cost':
        include "master/category-cost/edit-category-cost.php";
        break;
    case 'add-category-cost':
        include "master/category-cost/process-add-category-cost.php";
        break;
    case 'edit-category-cost':
        include "master/category-cost/process-edit-category-cost.php";
        break;
    case 'delete-category-cost':
        include "master/category-cost/process-delete-category-cost.php";
        break;

    case 'product':
        include "master/product/index.php";
        break;
    case 'page-edit-product':
        include "master/product/edit-prd.php";
        break;
    case 'add-product':
        include "master/product/process-add-prd.php";
        break;
    case 'edit-product':
        include "master/product/process-edit-prd.php";
        break;
    case 'delete-product':
        include "master/product/process-delete-prd.php";
        break;

    case 'unit':
        include "master/unit/index.php";
        break;
    case 'page-edit-unit':
        include "master/unit/edit-unit.php";
        break;
    case 'add-unit':
        include "master/unit/process-add-unit.php";
        break;
    case 'edit-unit':
        include "master/unit/process-edit-unit.php";
        break;
    case 'delete-unit':
        include "master/unit/process-delete-unit.php";
        break;

    case 'supplier':
        include "master/supplier/index.php";
        break;
    case 'page-edit-supplier':
        include "master/supplier/edit-supplier.php";
        break;
    case 'add-supplier':
        include "master/supplier/process-add-supplier.php";
        break;
    case 'edit-supplier':
        include "master/supplier/process-edit-supplier.php";
        break;
    case 'delete-supplier':
        include "master/supplier/process-delete-supplier.php";
        break;


    case 'approved-of-material-purchase-request':
        include "material-request/approved/index-approved.php";
        break;
    case 'detail-approved-of-material-purchase-request':
        include "material-request/approved/detail-approve.php";
        break;

    case 'pending-material-purchase-request':
        include "material-request/pending/index-pending.php";
        break;
    case 'detail-pending-material-purchase-request':
        include "material-request/pending/detail-pending.php";
        break;
    case 'approval':
        include "material-request/pending/process-approve-mr.php";
        break;

    case 'page-edit-material-purchase-request':
        include "material-request/edit-mr.php";
        break;

    case 'page-add-material-purchase-request':
        include "material-request/add-mr.php";
        break;

    case 'add-material-purchase-request':
        include "material-request/process-add-mr.php";
        break;
    case 'edit-material-purchase-request':
        include "material-request/process-edit-mr.php";
        break;
    case 'delete-material-purchase-request':
        include "material-request/process-delete-mr.php";
        break;

    case 'rejected-of-mpr':
        include "material-request/rejected/index-rejected.php";
        break;
    case 'detail-rejected-material-purchase-request':
        include "material-request/rejected/detail-rejected.php";
        break;
    case 'page-edit-rejected-of-material-purchase-request':
        include "material-request/rejected/page-edit-rejected.php";
        break;
    case 'rejected-of-material-purchase-request':
        include "material-request/rejected/process-reject.php";
        break;
    case 'edit-rejected-of-material-purchase-request':
        include "material-request/rejected/edit-rejected.php";
        break;

        // REPORT
    case 'report-mpr-approved':
        include "report/mpr-approved/index.php";
        break;
    case 'result-report-mpr-approved':
        include "report/mpr-approved/result.php";
        break;

    case 'result-report-mpr-rejected':
        include "report/mpr-rejected/index.php";
        break;
    case 'result-report-mpr-rejected':
        include "report/mpr-rejected/result.php";
        break;

        // USER MANAGEMENT
    case 'user-management':
        include "users/index.php";
        break;
    case 'page-edit-user-management':
        include "users/edit-user-management.php";
        break;
    case 'add-user':
        include "users/process-add-user-management.php";
        break;
    case 'edit-user':
        include "users/process-edit-user-management.php";
        break;
    case 'delete-user':
        include "users/process-delete-user-management.php";
        break;
    case 'logout':
        include "users/signout.php";
        break;

        // RESTORE
    case 'restore-category-cost':
        include "restore/category-cost/index.php";
        break;
    case 'process-restore-category-cost':
        include "restore/category-cost/process-restore.php";
        break;
    case 'permanent-delete-restore-category-cost':
        include "restore/category-cost/permanent-delete.php";
        break;

    case 'restore-category-item':
        include "restore/category-item/index.php";
        break;
    case 'process-restore-category-item':
        include "restore/category-item/process-restore.php";
        break;
    case 'permanent-delete-restore-category-item':
        include "restore/category-item/permanent-delete.php";
        break;

    case 'restore-department':
        include "restore/department/index.php";
        break;
    case 'process-restore-department':
        include "restore/department/process-restore.php";
        break;
    case 'permanent-delete-restore-department':
        include "restore/department/permanent-delete.php";
        break;

    case 'restore-approved-material-purchase-request':
        include "restore/mpr-approved/index.php";
        break;
    case 'process-restore-approved-material-purchase-request':
        include "restore/mpr-approved/process-restore.php";
        break;
    case 'permanent-delete-restore-approved-material-purchase-request':
        include "restore/mpr-approved/permanent-delete.php";
        break;

    case 'restore-pending-material-purchase-request':
        include "restore/mpr-pending/index.php";
        break;
    case 'process-restore-pending-material-purchase-request':
        include "restore/mpr-pending/process-restore.php";
        break;
    case 'permanent-delete-restore-pending-material-purchase-request':
        include "restore/mpr-pending/permanent-delete.php";
        break;

    case 'restore-product':
        include "restore/product/index.php";
        break;
    case 'process-restore-product':
        include "restore/product/process-restore.php";
        break;
    case 'permanent-delete-restore-product':
        include "restore/product/permanent-delete.php";
        break;

    case 'restore-supplier':
        include "restore/supplier/index.php";
        break;
    case 'process-restore-supplier':
        include "restore/supplier/process-restore.php";
        break;
    case 'permanent-delete-restore-supplier':
        include "restore/supplier/permanent-delete.php";
        break;

    case 'restore-unit':
        include "restore/unit/index.php";
        break;
    case 'process-restore-unit':
        include "restore/unit/process-restore.php";
        break;
    case 'permanent-delete-restore-unit':
        include "restore/unit/permanent-delete.php";
        break;



    default:
        include 'dashboard.php';
}
