<nav class="active" id="sidebar">
    <ul class="list-unstyled lead">
        <li class="active">
            <a href=""><i class="fa fa-home">HOME</i></a>
        </li>
        <li>
            <a href="{{ route('orders.index') }}"><i class="fa fa-box fa-lg"></i>ORDERS</a>
        </li>
       
        <li>
            <a href="{{ route('products.index') }}"><i class="fa fa-truck fa-lg"></i>PRODUCTS</a>
        </li>
        <li>
            <a href="{{ route('sections.index') }}"><i class="fas fa-square"></i>SECTIONS</a>
        </li>
    </ul>
</nav>

<style>
    #sidebar ul.lead{
        border-bottom: 1px solid #47748b;
        width: fit-content;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #008b8b;
        text-decoration: none;
    }

    #sidebar ul li {
        list-style: none;
    }

    #sidebar ul li a:hover {
        color: #fff;
        background: #008b8b;
        text-decoration: none !important;
    }

    #sidebar ul li.active>a, a[aria-expanded="true"]{
       color: #fff;
       background: #008b8b;
    }
</style>