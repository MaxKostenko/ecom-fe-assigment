<script>
  import BlockLoaderText from '@/components/base/BlockLoaderText';

  export default {
    functional: true,
    name: 'block-loader',
    props: {
      isLoading: {
        type: Boolean,
        required: false,
      },
    },

    render(createElement, context) {
       const child = context.children[0];

      if( context.props.isLoading ) {
        const newData = {
          ...child.data,
          'class': child.data['class'] ? `${child.data['class']} ` : 'loading-holder'
        };
        child.children.push(createElement(BlockLoaderText));

        return createElement(child.tag, newData, child.children);


      } else {
        return createElement(child.tag, child.data, child.children);
      }

    },
  };
</script>

<style scoped>
  .loading-holder {
    position: relative;
  }

  .loading-cover {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background-color: #f0f0f0;
    opacity: 0.7;
  }
</style>
