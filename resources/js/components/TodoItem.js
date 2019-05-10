import React, { Component } from "react";
import PropTypes from "prop-types";

class TodoItem extends Component {
	getStyle() {
		return {
			background: "#f4f4f4",
			padding: "10px",
			borderBottom: this.props.todo.completed,
			textDecoration: this.props.todo.completed ? "line-through" : "none"
		};
	}

	markComplete = e => {
		console.log(this.props);
	};

	render() {
		const { todo } = this.props;
		return (
			<div style={this.getStyle()}>
				<p>
					<input
						type="checkbox"
						onChange={this.markComplete.bind(this)}
					/>
					{todo.title}
				</p>
			</div>
		);
	}
}

TodoItem.PropTypes = {
	todos: PropTypes.array.isRequired
};

export default TodoItem;

const name = params => { };
