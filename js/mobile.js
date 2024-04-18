var page = location.pathname.split("/").slice(-1)[0]
function checkMediaQuery() {
    if(page != '') {
        if (window.innerWidth < 768) {
            document.getElementById("page-title").classList.add('hidden')
            document.getElementById("open").classList.remove('hidden')
            document.getElementById("close").classList.remove('hidden')
            document.getElementById("left-section").classList.add('hidden')
            document.getElementById("left-section").classList.remove('w-3/6')
            document.getElementById("left-section").classList.remove('max-w-md')
            document.getElementById("left-section").classList.add('w-full')
            document.getElementById("open").addEventListener('click', () => {
                document.getElementById("left-section").classList.remove('hidden')
                document.getElementById("left-section").classList.add('fixed')
                document.getElementById("left-section").classList.add('z-20')
                document.getElementById("left-section").classList.add('h-full')
            })
            document.getElementById("close").addEventListener('click', () => {
                document.getElementById("left-section").classList.add('hidden')
                document.getElementById("left-section").classList.remove('fixed')
                document.getElementById("left-section").classList.remove('z-20')
                document.getElementById("left-section").classList.remove('h-full')
            })
        }
        if (window.innerWidth > 768) {
            document.getElementById("page-title").classList.remove('hidden')
            document.getElementById("open").classList.add('hidden')
            document.getElementById("close").classList.add('hidden')
            document.getElementById("left-section").classList.remove('hidden')
            document.getElementById("left-section").classList.remove('w-full')
            document.getElementById("left-section").classList.add('w-3/6')
            document.getElementById("left-section").classList.add('max-w-md')
        }
    }else {
        if (window.innerWidth < 480) {
            document.getElementById("homeLogo").src = '/img/logo2.png'
            document.getElementById("homeLogo").style.width = '38px'
        }
        if (window.innerWidth > 480) {
            document.getElementById("homeLogo").src = '/img/logo.svg'
            document.getElementById("homeLogo").style.width = '120px'
        }
    }
}

window.addEventListener('resize', checkMediaQuery)
window.addEventListener('DOMContentLoaded', checkMediaQuery)
