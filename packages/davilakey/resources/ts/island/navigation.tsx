import React, {useEffect, useRef, useState} from 'react';
import {createRoot} from "react-dom/client";
import axios from "axios";

function Navigation() {
    const [isAuthenticated, setIsAuthenticated] = useState(false);
    const [isDropdownOpen, setIsDropdownOpen] = useState(false);
    const dropdownRef= useRef<HTMLDivElement>(null);

    useEffect(() => {
        const getUser = async () => {
            const res = await axios.get('/x/user', { withCredentials: true });
            if (res.status === 200) {
                setIsAuthenticated(true);
            }
        }

        getUser().catch(console.error);
    }, []);

    useEffect(() => {
        if (!dropdownRef.current) return;

        if (isDropdownOpen) {
            dropdownRef.current.classList.remove('hidden');
            dropdownRef.current.classList.add('block');
            dropdownRef.current.classList.add('absolute');
            dropdownRef.current.classList.add('top-14');
        } else {
            dropdownRef.current.classList.remove('block');
            dropdownRef.current.classList.remove('absolute');
            dropdownRef.current.classList.remove('top-14');
            dropdownRef.current.classList.add('hidden');
        }
    }, [isDropdownOpen]);

    return <nav className="bg-white border-gray-200 dark:bg-gray-900">
        <div className="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" className="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" className="h-8 mr-3" alt="Flowbite Logo"/>
                <span className="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">DK</span>
            </a>
            <div className="flex items-center md:order-2">
                <button type="button"
                        className="flex mr-3 text-sm rounded-full md:mr-6 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 dark:text-white"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                         stroke="currentColor" className="w-7 h-7">
                        <path strokeLinecap="round" strokeLinejoin="round"
                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                    </svg>
                </button>
                {
                    isAuthenticated ? (
                        <button type="button"
                                onClick={() => setIsDropdownOpen((current) => !current)}
                                className="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                data-dropdown-placement="bottom">
                            <span className="sr-only">Open user menu</span>
                            <img className="w-8 h-8 rounded-full"
                                 src="https://images.unsplash.com/photo-1604072366595-e75dc92d6bdc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=facearea&facepad=2&w=40&h=40&q=80"
                                 alt=""/>
                        </button>
                    ) : (
                        <button className="py-2 px-5 border border-gray-600 rounded-lg dark:text-white dark:hover:bg-gray-700">Sign in</button>
                    )
                }
                <div
                    ref={dropdownRef}
                    className="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div className="px-4 py-3">
                        <span className="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                        <span
                            className="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                    </div>
                    <ul className="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#"
                               className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                               className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                               className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="#"
                               className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div
                className="items-center mt-4 justify-between w-full md:mt-0 md:flex md:flex-1 md:w-auto md:order-1 md:ml-12 md:mr-12"
                id="mobile-menu-2">
                <div className="relative md:flex md:w-full">
                    <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg className="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fillRule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clipRule="evenodd"></path>
                        </svg>
                    </div>
                    <label htmlFor="search-navbar" className="sr-only">Search icon</label>
                    <input type="text" id="search-navbar"
                           className="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Search..."/>
                </div>
            </div>
        </div>
    </nav>
}

const container = document.getElementById('island-navigation');
if (container) {
    const root = createRoot(container);
    root.render(<Navigation />);
}
