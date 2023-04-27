
document.getElementById('header-search').addEventListener('keyup', (e)=> {
    e.preventDefault()
    switch(e.keyCode) {
        case 13:
            window.location.href = '/shop?search='+e.target.value
            break
    }
})


document.getElementById('sort').addEventListener('change', (e)=> {
    window.location.href = '?sort='+e.target.value
})
