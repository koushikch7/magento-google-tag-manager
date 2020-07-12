var config = {
    map: {
        '*': {
            chkGtmDatalayer: 'CHK_GoogleTagManager/js/datalayer'
        }
    },
    shim: {
        'CHK_GoogleTagManager/js/datalayer': ['Magento_Customer/js/customer-data']
    }
};
