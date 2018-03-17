<script>
  import PostItem from '@/components/BlogContent/PostItem';

  export default {
    functional: true,
    render(createElement, context) {

      return context.props.posts.map((post) => {
        const newContext = {
          props: {
            post,
          },
        };
        return createElement(PostItem, newContext);
      });
    },

  };
</script>
