function validateFixedPriceForm() {
    form = new FormData(document.getElementById('fixed-price'));
    watchers = form.getAll('watchers[]');
    console.log(watchers.length);
    if(watchers.length > 0){
        return true;
    }
    required_alert('Select at least one watcher', 'top-right', 'error')
    return false;
}