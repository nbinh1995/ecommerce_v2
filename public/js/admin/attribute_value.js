const ID_ATTR_VALUE = '#attr_value';
const ID_HIDDEN = '#attr_value_hidden';
const ID_DISPLAY_TAG = '#display-tag';

var attr_value = attr_value || {};
    
    attr_value.showItem = function(){
        let stringValue =  $(ID_HIDDEN).val();
        let arrayValue =stringValue === ''? [] : stringValue.split(',');
        $(ID_DISPLAY_TAG).empty();
        arrayValue.length === 0 ? $(ID_DISPLAY_TAG).html('<i>No Value Attribute</i>') : $.each(arrayValue, function( index, value ) {
            $(ID_DISPLAY_TAG).append(`<span class="btn btn-xs btn-primary m-1">${value} <small class="badge ml-2 remove-tag" data-index ='${index}'>X</small></span>`)
        });
    }

    attr_value.addItem = function(){
        let stringValue =  $(ID_HIDDEN).val();
        let arrayValue =stringValue === '' ? [] : stringValue.split(',');
        let newValue =  $(ID_ATTR_VALUE).val();
        if(newValue === '') {
            return alert('Value Not Empty');
        }else{
            arrayValue.push(newValue);
        }
       
        $(ID_ATTR_VALUE).val('');
        $(ID_HIDDEN).val(arrayValue.join(','));
    }

    attr_value.removeItem = function(element){
        let index = $(element).data('index');
        let stringValue =  $(ID_HIDDEN).val();
        let arrayValue =stringValue === ''? [] : stringValue.split(',');
        arrayValue.splice(index,1);
        $(ID_HIDDEN).val(arrayValue.join(','));
        
    }
$(document).ready(function(){

    $(document).on("click", ".add-tag", function (e) {
        e.preventDefault();
        attr_value.addItem();
        attr_value.showItem();
    });

    $(document).on("click", ".remove-tag", function (e) {
        e.preventDefault();
        attr_value.removeItem(e.target);
        attr_value.showItem();
    });
});