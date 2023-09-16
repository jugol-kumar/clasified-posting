import {Inertia} from "@inertiajs/inertia";
import * as Swal from "sweetalert2";

export function useAction(url = null) {
      const deleteItem = (main_url, id) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Inertia.delete(main_url + "/" + id, {
                        preserveState: true, replace: true, onSuccess: page => {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        },
                        onError: errors => {
                            Swal.fire(
                                'Oops...',
                                'Something went wrong!',
                                'error'
                            )
                        }
                    })
                }
            })
      };

    const copyToClipboard = async (slug) => {
        await navigator.clipboard.writeText(slug);
        $toast.success("This Product Slug Copped");
    };



    return {deleteItem, copyToClipboard}
}
