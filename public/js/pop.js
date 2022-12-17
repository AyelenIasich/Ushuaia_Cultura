//Popover normal
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

// popover de agradecimiento se cierra al dar el siguiente click en cualquier sitio
// const popover = new bootstrap.Popover('.popover-dismiss', {
//     trigger: 'focus'
//   })
