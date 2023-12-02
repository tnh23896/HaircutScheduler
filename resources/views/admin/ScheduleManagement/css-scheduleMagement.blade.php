<style>
    input[type="radio"]:checked+label>img {
        border: 4px solid ##312E81;
    }

    input[type="radio"]:checked+label>h6 {
        color: ##312E81;
    }

    label.check {
        cursor: pointer;
    }

    label.check input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
        pointer-events: none;
    }

    label.check span {
        padding: 7px 14px;
        border: 2px solid #312E81;
        display: inline-block;
        color: #312E81;
        border-radius: 3px;
        text-transform: uppercase;
    }

    label.check input:checked+span {
        border-color: #312E81;
        background-color: #312E81;
        color: #fff;
    }

    label.check input:disabled+span {
        border-color: #312E81;
        background-color: #312E81;
        color: #fff;
        cursor: default;
    }
    #faq-accordion-content-2{
			border: 2px solid #F1F5F9;
		}

    .card-header {
        background-color: #312E81;
    }

    .collapsible-link::before {
        content: '';
        width: 14px;
        height: 2px;
        background: #333;
        position: absolute;
        top: calc(50% - 1px);
        right: 1rem;
        display: block;
        transition: all 0.3s;
    }

    .collapsible-link::after {
        content: '';
        width: 2px;
        height: 14px;
        background: #333;


        position: absolute;
        top: calc(50% - 7px);
        right: calc(1rem + 6px);
        display: block;
        transition: all 0.3s;
    }

    label.check {
        cursor: pointer;
    }

    label.check input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
        pointer-events: none;
    }

    label.check span {
        padding: 7px 14px;
        border: 2px solid #312E81;
        display: inline-block;
        color: #312E81;
        border-radius: 3px;
        text-transform: uppercase;
    }

    label.check input:checked+span {
        border-color: #312E81;
        background-color: #312E81;
        color: #fff;
    }

    label.check input:disabled+span {
        border-color: #312E81;
        background-color: #312E81;
        color: #fff;
        cursor: default;
    }

    .cursor-pointer {
        /* background-color: #d9842f; */
        /* height: 30px; */
        /* align-items: center; */
        /* display: flex */
    }

    /* //ảnh// */
    .radio-button-with-image {
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
    }

    .radio-button-with-image input[type="radio"] {
        display: none;
    }

    .radio-button-with-image .image-container {
        width: 180px;
        height: 180px;
        overflow: hidden;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 0.5rem;
    }

    .radio-button-with-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .radio-button-with-image div {
        font-size: 1rem;
    }

    .radio-button-with-image input[type="radio"]:checked+.image-container {
        border: 2px solid #312E81;
    }

    .radio-button-with-image:hover .image-container {
        border: 2px solid #312E81;
    }

    .my-select {
        width: 200px;
        background-color: #312E81;
        color: #fff;
        border: 0 none;
        border-radius: 20px;
        padding: 6px 20px;
    }
</style>
