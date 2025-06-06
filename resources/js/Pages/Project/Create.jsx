import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import SelectInput from "@/Components/SelectInput";
import TextAreaInput from "@/Components/TextAreaInput";
import TextInput from "@/Components/TextInput";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Create({ auth }) {

    const { data, setData, post, errors, reset } = useForm({
        image: "",
        name: "",
        status: "",
        description: "",
        due_date: "",
    })

    const onSubmit = (e) => {
        e.preventDefault();

        post(route("project.store"))
    }
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="text-xl font-semibold leading-tight text-gray-800">
                        Creat New Project
                    </h2>
                </div>

            }
        >

            <Head title="Projects" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">

                    <form className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" onSubmit={onSubmit}>
                        <div>
                            <InputLabel
                                htmlFor="project_image_path"
                                value="Project Image"
                                className="text-white font-bold text-xl pb-3"
                            />
                            <TextInput id="project_image_path"
                                type="file"
                                name="image"
                                value={data.image}
                                className="mt-1 block w-full text-white bg-gray-700"
                                onChange={e => setData("image", e.target.value)}
                            />
                            <InputError message={errors.image} className="mt-2 text-red-500" />
                        </div>
                        <div className="mt-8">
                            <InputLabel
                                htmlFor="project_name"
                                value="Project Name"
                                className="text-white font-bold text-xl pb-3"
                            />
                            <TextInput id="project_name"
                                type="text"
                                name="name"
                                value={data.name}
                                className="mt-1 block w-full text-white bg-gray-700"
                                isFocused={true}
                                onChange={e => setData("name", e.target.value)}
                            />
                            <InputError message={errors.name} className="mt-2 text-red-500" />
                        </div>
                        <div className="mt-8">
                            <InputLabel
                                htmlFor="project_description"
                                value="Project Description"
                                className="text-white font-bold text-xl pb-3"
                            />
                            <TextAreaInput
                                id="project_description"
                                type="text"
                                name="name"
                                value={data.description}
                                className="mt-1 block w-full text-white bg-gray-700"
                                onChange={e => setData("description", e.target.value)}
                            />
                            <InputError message={errors.description} className="mt-2 text-red-500" />

                            <div className="mt-8">
                                <InputLabel
                                    htmlFor="project_due_date"
                                    value="Project Deadline"
                                    className="text-white font-bold text-xl pb-3"
                                />

                                <TextInput
                                    id="project_due_date"
                                    type="date"
                                    name="due_date"
                                    value={data.due_date}
                                    className="mt-1 block w-full text-white bg-gray-700"
                                    onChange={(e) => setData("due_date", e.target.value)}
                                />
                                <InputError message={errors.due_date} className="mt-2 text-red-500" />
                            </div>

                            <div className="mt-8">
                                <InputLabel htmlFor="project_status" 
                                value="Project Status"
                                className="text-white font-bold text-xl pb-3"
                                />

                                <SelectInput
                                    name="status"
                                    id="project_status"
                                    className="mt-1 block w-full text-white bg-gray-700"
                                    onChange={(e) => setData("status", e.target.value)}
                                >
                                    <option value="">Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                </SelectInput>

                                <InputError message={errors.project_status} className="mt-2" />
                            </div>
                        </div>

                        <div className="mt-8 text-right">
                            <Link 
                            href = {route("project.index")} 
                            className="bg-gray-100 py-1 px-3 text-gray-800 rounded shadow transition-all hover:bg-gray-200 mr-2"
                            >
                                Cancel
                            </Link>
                            <button className="bg-emerald-500 py-1 px-3 text-white rounded shadow transition-all hover:bg-emerald-600">
                                Submit
                            </button>
                        </div>
                    </form>

                </div>

            </div>


        </AuthenticatedLayout>
    );
}