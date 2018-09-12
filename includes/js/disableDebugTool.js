window.console.log = function(){
    console.error('The developer console is temp...');
    window.console.log = function() {
        return false;
    }
}

console.log('test');