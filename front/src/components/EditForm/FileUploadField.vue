<template>
    <div class="holder">
        <div class="link-holder">
            <span>Please select filePlease select filePlease select filePlease select filePlease select filePlease select filePlease select file</span>
            <a href="#">(x remove image)</a>
        </div>
        <div class="button-holder">
            <form-button type="button">Upload Image</form-button>
        </div>
        <input class="upload_field" type="file"/>
    </div>
</template>

<script>
import FormButton from '@/components/EditForm/FormButton';

export default {
    name: 'file-upload-field',
    components: {
        FormButton
    }
}
</script>

<style scoped>
    .holder {
        display: inline-block;
        width: 100%;
        margin-bottom: 20px;
    }
    .upload_field {

        display: none;
    }
    .link-holder {
        float: left;
        width: 100%;
        padding-right: 180px;

    }
    .button-holder {
        float: left;
        width: 150px;
        margin-left: -150px;
    }
    .button-holder:after {
        clear: both;
    }

</style>