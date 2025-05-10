document.addEventListener('DOMContentLoaded', function () {
  const input = document.querySelector('input[type="search"]')

  if (input) {
    const clearBtn = document.querySelector('.clear-query')
    const resetBtn = document.querySelector('.reset-query')
    const searchBtn = document.querySelector('.search-btn')

    if (input.value.length > 0) {
      resetBtn.classList.remove('hidden')
      searchBtn.classList.add('hidden')
    }

    input.addEventListener('input', function () {
      if (input.value.length > 0) {
        clearBtn.classList.remove('hidden')
        resetBtn.classList.add('hidden')
        searchBtn.classList.remove('hidden')
      } else {
        clearBtn.classList.add('hidden')
        resetBtn.classList.remove('hidden')
        searchBtn.classList.add('hidden')
      }
    })

    clearBtn.addEventListener('click', function () {
      input.value = ''
      clearBtn.classList.add('hidden')
      input.focus()
    })

    resetBtn.addEventListener('click', function () {
      input.value = ''
    })
  }
})
