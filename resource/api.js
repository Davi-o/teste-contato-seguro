async function deleteContact(id) {

    await fetch(`/teste-contato-seguro/api/delete-contact/${id}`, {
        method: 'DELETE',
    })
        .then((response) => {
            if (response.ok) {
                location.reload()
            }
        })
}