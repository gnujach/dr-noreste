<template>
    <svg
        v-if="name === 'apple'"
        xmlns="http://www.w3.org/2000/svg"
        width="100"
        height="100"
        viewBox="0 0 100 100"
    >
        <g fill-rule="nonzero">
            <path
                d="M46.173 19.967C49.927-1.838 19.797-.233 14.538.21c-.429.035-.648.4-.483.8 2.004 4.825 14.168 31.66 32.118 18.957zm13.18 1.636c1.269-.891 1.35-1.614.047-2.453l-2.657-1.71c-.94-.607-1.685-.606-2.532.129-5.094 4.42-7.336 9.18-8.211 15.24 1.597.682 3.55.79 5.265.328 1.298-4.283 3.64-8.412 8.088-11.534z"
            />
            <path
                d="M88.588 67.75c9.65-27.532-13.697-45.537-35.453-32.322-1.84 1.118-4.601 1.118-6.441 0-21.757-13.215-45.105 4.79-35.454 32.321 5.302 15.123 17.06 39.95 37.295 29.995.772-.38 1.986-.38 2.758 0 20.235 9.955 31.991-14.872 37.295-29.995z"
            />
        </g>
    </svg>
    <svg
        v-else-if="name === 'book'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M6 4H5a1 1 0 1 1 0-2h11V1a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1h-7v8l-2-2-2 2V4z"
        />
    </svg>
    <svg
        v-else-if="name === 'cheveron-down'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
        />
    </svg>
    <svg
        v-else-if="name === 'cheveron-right'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <polygon
            points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"
        />
    </svg>
    <svg
        v-else-if="name === 'dashboard'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-5.6-4.29a9.95 9.95 0 0 1 11.2 0 8 8 0 1 0-11.2 0zm6.12-7.64l3.02-3.02 1.41 1.41-3.02 3.02a2 2 0 1 1-1.41-1.41z"
        />
    </svg>
    <svg
        v-else-if="name === 'location'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
        />
    </svg>
    <svg
        v-else-if="name === 'office'"
        xmlns="http://www.w3.org/2000/svg"
        width="100"
        height="100"
        viewBox="0 0 100 100"
    >
        <path
            fill-rule="evenodd"
            d="M7 0h86v100H57.108V88.418H42.892V100H7V0zm9 64h11v15H16V64zm57 0h11v15H73V64zm-19 0h11v15H54V64zm-19 0h11v15H35V64zM16 37h11v15H16V37zm57 0h11v15H73V37zm-19 0h11v15H54V37zm-19 0h11v15H35V37zM16 11h11v15H16V11zm57 0h11v15H73V11zm-19 0h11v15H54V11zm-19 0h11v15H35V11z"
        />
    </svg>
    <svg
        v-else-if="name === 'printer'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M4 16H0V6h20v10h-4v4H4v-4zm2-4v6h8v-6H6zM4 0h12v5H4V0zM2 8v2h2V8H2zm4 0v2h2V8H6z"
        />
    </svg>
    <svg
        v-else-if="name === 'shopping-cart'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M4 2h16l-3 9H4a1 1 0 1 0 0 2h13v2H4a3 3 0 0 1 0-6h.33L3 5 2 2H0V0h3a1 1 0 0 1 1 1v1zm1 18a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm10 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
        />
    </svg>
    <svg
        v-else-if="name === 'store-front'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M18 9.87V20H2V9.87a4.25 4.25 0 0 0 3-.38V14h10V9.5a4.26 4.26 0 0 0 3 .37zM3 0h4l-.67 6.03A3.43 3.43 0 0 1 3 9C1.34 9 .42 7.73.95 6.15L3 0zm5 0h4l.7 6.3c.17 1.5-.91 2.7-2.42 2.7h-.56A2.38 2.38 0 0 1 7.3 6.3L8 0zm5 0h4l2.05 6.15C19.58 7.73 18.65 9 17 9a3.42 3.42 0 0 1-3.33-2.97L13 0z"
        />
    </svg>
    <svg
        v-else-if="name === 'trash'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"
        />
    </svg>
    <svg
        v-else-if="name === 'users'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z"
        />
    </svg>
    <svg
        v-else-if="name === 'config'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        class="fill-current w-5 h-5"
    >
        <path
            d="M22.9 10.1c-.1-.1-.2-.2-.3-.2L20 9.5c-.1-.5-.3-.9-.6-1.4.2-.2.4-.6.8-1 .3-.4.6-.8.7-1 .1 0 .1-.2.1-.3 0-.1 0-.2-.1-.3-.3-.5-1.1-1.3-2.4-2.4-.1-.1-.2-.1-.4-.1-.1 0-.3 0-.3.1l-2 1.5c-.4-.2-.8-.4-1.3-.5l-.4-2.6c0-.1-.1-.2-.2-.3-.1-.2-.2-.2-.3-.2h-3.2c-.3 0-.4.1-.5.4-.1.5-.3 1.4-.4 2.7-.5.1-.9.3-1.3.5l-2-1.5c-.1-.1-.3-.2-.4-.2-.2 0-.7.3-1.4 1-.6.7-1.1 1.3-1.4 1.6-.1.1-.1.2-.1.3 0 .1 0 .2.1.3.6.8 1.2 1.4 1.5 2-.2.5-.3.9-.5 1.4l-2.6.4c-.1 0-.2.1-.3.2-.1.1-.1.2-.1.3v3.2c0 .1 0 .2.1.3.1.1.2.2.3.2l2.6.4c.1.5.3.9.6 1.4-.2.2-.4.6-.8 1-.3.4-.6.8-.7 1-.1.1-.1.2-.1.3 0 .1 0 .2.1.3.4.5 1.2 1.3 2.4 2.4.1.1.2.2.4.2.1 0 .3 0 .4-.1l2-1.5c.3.1.7.3 1.2.5l.4 2.6c0 .1.1.2.2.3.1.1.2.1.4.1h3.2c.3 0 .4-.1.5-.4.1-.5.3-1.4.4-2.7.4-.1.9-.3 1.3-.5l2 1.5c.1.1.3.1.4.1.2 0 .7-.3 1.3-1 .7-.7 1.2-1.2 1.4-1.5.1-.1.1-.2.1-.3 0-.1 0-.2-.1-.4-.7-.8-1.2-1.5-1.5-2 .2-.4.4-.8.6-1.3l2.7-.4c.1 0 .2-.1.3-.2.1-.1.1-.2.1-.3v-3.2c-.2-.1-.2-.2-.3-.3zm-8.3 4.5c-.7.7-1.6 1.1-2.6 1.1s-1.9-.4-2.6-1.1c-.7-.7-1.1-1.6-1.1-2.6s.4-1.9 1.1-2.6c.7-.7 1.6-1.1 2.6-1.1s1.9.4 2.6 1.1c.7.7 1.1 1.6 1.1 2.6s-.4 1.9-1.1 2.6z"
        />
    </svg>
    <svg
        v-else-if="name === 'health'"
        viewBox="0 0 512.001 512.001"
        xmlns="http://www.w3.org/2000/svg"
    >
        <g>
            <path
                d="m203.5 240h105v-67.5h67.5v-105h-67.5v-67.5h-105v67.5h-67.5v105h67.5zm-37.5-97.5v-45h67.5v-67.5h45v67.5h67.5v45h-67.5v67.5h-45v-67.5z"
            />
            <path
                d="m0 512h512.001l-46.875-90h-18.401l65.275-125.327v-206.673c0-24.813-20.187-45-45-45s-45 20.187-45 45v114.58c-15.832-5.57-34.181-2.039-46.819 10.6l-112.255 112.256c-2.516 2.516-4.82 5.188-6.926 7.982-2.106-2.795-4.411-5.466-6.927-7.983l-112.253-112.255c-12.639-12.638-30.987-16.17-46.82-10.6v-114.58c0-24.813-20.187-45-45-45s-45 20.188-45 45v206.672l65.275 125.328h-18.4zm462.551-30h-191.551v-30h175.926zm-178.411-133.353 112.254-112.253c5.85-5.848 15.365-5.848 21.213 0 2.833 2.833 4.394 6.6 4.394 10.607s-1.561 7.773-4.394 10.607l-112.21 112.208 21.213 21.213 112.209-112.209c8.382-8.381 13.04-19.487 13.168-31.32.013 0 .013-157.5.013-157.5 0-8.271 6.729-15 15-15s15 6.729 15 15v199.328l-69.1 132.672h-141.9v-41.5c0-12.065 4.667-23.378 13.14-31.853zm-254.14-59.319v-199.328c0-8.271 6.729-15 15-15s15 6.729 15 15v157.5c.158 11.356 4.535 22.674 13.18 31.32l112.21 112.209 21.213-21.213-112.209-112.209c-5.849-5.849-5.849-15.365 0-21.213 5.85-5.848 15.366-5.849 21.214 0l112.252 112.253c8.473 8.475 13.14 19.788 13.14 31.853v41.5h-141.9zm35.075 162.672h175.925v30h-191.55z"
            />
        </g>
    </svg>
    <svg
        v-else-if="name === 'calculator'"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm3 1v2h10V3H5zm0 4v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9zm4 0v6h2v-6h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9z"
        />
    </svg>
    <svg
        v-else-if="name === 'money'"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
    >
        <path
            d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z"
        />
    </svg>
    <svg
        v-else-if="name === 'cash'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
        />
    </svg>
    <svg
        v-else-if="name === 'corte'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"
        />
    </svg>
    <svg
        v-else-if="name === 'sun'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
        />
    </svg>
    <svg
        v-else-if="name === 'user'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
        />
    </svg>
    <svg
        v-else-if="name === 'calendar'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
        />
    </svg>
    <svg
        v-else-if="name === 'add-grid'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"
        />
    </svg>
    <svg
        v-else-if="name === 'clock'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
        />
    </svg>
    <svg
        v-else-if="name === 'save'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"
        />
    </svg>
    <svg
        v-else-if="name === 'plus'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
        />
    </svg>
    <svg
        v-else-if="name === 'cancel'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
        />
    </svg>
    <svg
        v-else-if="name === 'search'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
        />
    </svg>
    <svg
        v-else-if="name === 'check'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
        />
    </svg>
    <svg
        v-else-if="name === 'user-circle'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
        />
    </svg>
    <svg
        v-else-if="name === 'edit'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
        />
    </svg>
    <svg
        v-else-if="name === 'phone'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
        />
    </svg>
    <svg
        v-else-if="name === 'cog'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
        />
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
        />
    </svg>
    <svg
        v-else-if="name === 'reload'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
        />
    </svg>
    <svg
        v-else-if="name === 'photo'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
        />
    </svg>
    <svg
        v-else-if="name === 'x'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
        />
    </svg>
    <svg
        v-else-if="name === 'clipboard'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
        />
    </svg>
    <svg
        v-else-if="name === 'document-add'"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
        />
    </svg>

    <svg
        v-else-if="name === 'eye'"
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
        />
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
        />
    </svg>
    <svg
        v-else-if="name === 'user-remove'"
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"
        />
    </svg>
    <svg
        v-else-if="name === 'add-picture'"
        class="w-12 h-12 text-gray-500"
        aria-hidden="true"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 48 48"
    >
        <path
            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
        />
    </svg>
</template>

<script>
export default {
    props: {
        name: String,
    },
};
</script>
