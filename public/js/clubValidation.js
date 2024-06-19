$(document).ready(function () {
    $('#clubForm').validate({
        rules: {
            group_id: {
                required: true
            },
            business_name: {
                required: true
            },
            club_number: {
                required: true,
                minlength: 10,
                number: true
            },
            club_name: {
                required: true,
            },
            club_state: {
                required: true,
            },
            club_description: {
                required: true,
            },
            club_slug: {
                required: true,
                alphanumeric: true,
            },
            website_title: {
                required: true,
            },
            website_link: {
                required: true,
                url: true
            },
            club_logo: {
                required: true,
                accept: 'image/*'
            },
            club_banner: {
                required: true,
                accept: 'image/*'
            }
        },
        messages: {
            group_id: 'Please Enter Group Id',
            business_name: 'Please Enter Your Particular Club Business',
            club_number: {
                required: 'Please Enter Your Club Number',
                minlength: 'The Number Should Be Min of 10 Length',
                number: 'The Given Field Must Be Number'
            },
            club_name: 'Please Enter Your Club Name',
            club_state: 'Please Enter State',
            club_description: 'Please Enter Description About Your Club',
            club_slug: {
                required: 'Please Enter Club Slug Name',
                alphanumeric: 'Please Enter Only Alphabets....'
            },
            website_title: 'Please Enter Website Name',
            website_link: {
                required: 'Please provide Your Club Website Link',
                url: 'Please Provide URL ...'
            },
            club_logo: {
                required: 'Please Provide Club Logo',
                accept: 'Please Provide Proper Image Type...',
            },
            club_banner: {
                required: 'Please Provide Club Banner',
                accept: 'Please Provide Proper Image Type...',
            }
        },
    });
})

