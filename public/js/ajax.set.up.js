$('.money').mask('000.000.000.000.000,00', { reverse: true });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});